<?php

namespace bigpaulie\banggood\Client;


use bigpaulie\banggood\Enum\Banggood;
use bigpaulie\banggood\Exception\BanggoodException;
use bigpaulie\banggood\Exception\BanggoodPurchaseException;
use bigpaulie\banggood\Exception\InvalidArgumentException;
use bigpaulie\banggood\Interfaces\Arrayable;
use bigpaulie\banggood\Interfaces\RequestInterface;
use bigpaulie\banggood\Response\BaseResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use bigpaulie\banggood\Interfaces\ResponseInterface;

/**
 * Class BaseClient
 * @package bigpaulie\banggood\Client
 */
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
     * @throws BanggoodPurchaseException
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
            if (!$request instanceof Arrayable) {
                throw new InvalidArgumentException('Malformed request received', 500);
            }

            /** @var array $body */
            $body = $request->toArray();

            /** Set corresponding headers for this request */
            $headers['Content-Type'] = 'application/x-www-form-urlencoded';

            /** @var Request $httpRequest */
            $httpRequest = new Request(
                'POST',
                BanggoodURL::compose($endpoint, $parameters, $this->environment),
                $headers,
                http_build_query($body)
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

        /** @var ResponseInterface|BaseResponse $deserialized */
        $deserialized = $this->serializer->deserialize((string)$response->getBody(), $type, 'json');

        if ($deserialized->code != 0) {
            switch ($deserialized->code) {
                case 1:
                case 12032:
                case 12062:
                case 12063:
                    throw new BanggoodPurchaseException(
                        $deserialized->msg,
                        $deserialized->code,
                        null,
                        $request,
                        $deserialized
                    );
                default:
                    throw new BanggoodException(
                        $deserialized->msg,
                        $deserialized->code,
                        null,
                        $request,
                        $deserialized
                    );
            }
        }

        return $deserialized;
    }
}