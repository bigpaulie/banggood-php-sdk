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
     * @param string $endpoint
     * @param RequestInterface $request
     * @param array $headers
     * @return ResponseInterface
     * @throws BanggoodException
     */
    public function request(string $endpoint, RequestInterface $request, array $headers = []): ResponseInterface
    {
        /** @var Request $httpRequest */
        $httpRequest = new Request(
            'GET',
            $this->composeURL($endpoint, $request->getParameters()),
            $headers
        );

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
     * @param array $parameters
     * @return string
     */
    private function composeURL(string $endpoint, array $parameters = []): string
    {
        return sprintf(
            "%s/%s?%s",
            Banggood::ENDPOINT_PRODUCTION,
            $endpoint,
            http_build_query($parameters)
        );
    }
}