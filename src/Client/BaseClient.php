<?php

namespace bigpaulie\banggood\Client;


use bigpaulie\banggood\Enum\Banggood;
use bigpaulie\banggood\Exception\BanggoodException;
use bigpaulie\banggood\Interfaces\RequestInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use bigpaulie\banggood\Interfaces\ResponseInterface;

class BaseClient
{
    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var Client $http
     */
    protected $http;

    /**
     * @var Credentials $credentials
     */
    protected $credentials;

    /**
     * Working environment Production|Sandbox|UnitTesting
     * @var string $environment
     */
    protected $environment;

    /**
     * @param string $endpoint
     * @param RequestInterface $request
     * @param bool $requiresToken
     * @param bool $isPostRequest
     * @param array $headers
     * @return ResponseInterface
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(
        string $endpoint,
        RequestInterface $request,
        bool $requiresToken = true,
        bool $isPostRequest = false,
        array $headers = []
    ): ResponseInterface
    {
        /** @var array $parameters */
        $parameters = $request->getParameters();

        /**
         * All request except getAccessToken and importOrders requires
         * the presence of the access_token url parameter
         */
        if (!$requiresToken) {
            $parameters['app_id'] = $this->credentials->getAppId();
            $parameters['app_secret'] = $this->credentials->getAppSecret();
        }

        if ($isPostRequest) {

            /** @var SerializationContext $context */
            $context = (new SerializationContext())->shouldSerializeNull(false);

            /** @var Serializer $body */
            $body = $this->serializer->serialize($request, 'json', $context);

            /** Set corresponding headers for this request */
            $headers['Content-Type'] = 'application/json';

            /** @var Request $httpRequest */
            $httpRequest = new Request(
                'POST',
                BanggoodURL::compose($endpoint, $parameters, $this->environment),
                $headers,
                $body
            );
        } else {
            /** @var Request $httpRequest */
            $httpRequest = new Request(
                'GET',
                BanggoodURL::compose($endpoint, $parameters, $this->environment),
                $headers
            );
        }

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->http->send($httpRequest);

        /** @var string $type */
        $type = sprintf('bigpaulie\\banggood\\Response\\%sResponse', ucfirst($endpoint));

        /** @var ResponseInterface $deserialized */
        $deserialized = $this->serializer->deserialize((string)$response->getBody(), $type, 'json');

        if ($deserialized->code != 0) {
            throw new BanggoodException($deserialized->msg, $deserialized->code);
        }

        return $deserialized;
    }
}