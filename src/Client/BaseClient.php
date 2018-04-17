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
        if ($isPostRequest) {
            /** @var string accessToken */
            $request->accessToken = $this->credentials->getAccessToken();

            /** @var SerializationContext $context */
            $context = (new SerializationContext())->shouldSerializeNull(false);

            /** @var Serializer $body */
            $body = $this->serializer->serialize($request, 'json', $context);

            /** Set corresponding headers for this request */
            $headers['Content-type'] = 'application/json';

            /** @var Request $httpRequest */
            $httpRequest = new Request(
                'POST',
                $this->composeURL($endpoint, null, $requiresToken),
                $headers,
                $body
            );
        } else {
            /** @var Request $httpRequest */
            $httpRequest = new Request(
                'GET',
                $this->composeURL($endpoint, $request->getParameters(), $requiresToken),
                $headers
            );
        }

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->http->send($httpRequest);

        /** @var string $type */
        $type = sprintf('bigpaulie\\banggood\\Response\\%sResponse', ucfirst($endpoint));

        /** @var ResponseInterface $deserialized */
        $deserialized = $this->serializer->deserialize($response->getBody(), $type, 'json');

        if ($deserialized->code != 0) {
            throw new BanggoodException($deserialized->msg, $deserialized->code);
        }

        return $deserialized;
    }

    /**
     * @param string $endpoint
     * @param array|null $parameters
     * @param bool $requiresToken
     * @return string
     */
    private function composeURL(string $endpoint, $parameters = [], bool $requiresToken = true): string
    {
        /**
         * All request except getAccessToken and importOrders requires
         * the presence of the access_token url parameter
         */
        if ($requiresToken) {
            $parameters['access_token'] = $this->credentials->getAccessToken();
        } else {
            $parameters['app_id'] = $this->credentials->getAppId();
            $parameters['app_secret'] = $this->credentials->getAppSecret();
        }

        /**
         * In sandbox mode we need to always add this parameter
         */
        if (Banggood::ENDPOINT_SANDBOX == $this->environment) {
            $parameters['apiTest'] = 1;
        }

        return sprintf(
            "%s/%s?%s",
            $this->environment,
            $endpoint,
            http_build_query($parameters)
        );
    }
}