<?php

namespace bigpaulie\banggood;


use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Enum\Banggood;
use bigpaulie\banggood\Exception\InvalidArgumentException;
use GuzzleHttp\Client;
use Mockery;

/**
 * Class BanggoodClientFactory
 * This is a simple factory class to help you create the BanggoodClient easily
 *
 * @package bigpaulie\banggood
 */
class BanggoodClientFactory
{
    /**
     * Use this to make requests into the production API
     */
    const TYPE_PRODUCTION = 'production';

    /**
     * Use this to make requests into the sandbox API
     */
    const TYPE_SANDBOX = 'sandbox';

    /**
     * Use this to mock requests
     * The environment will be set to sandbox but no actual requests will go out
     * This flag is intended to be used for unit testing
     */
    const TYPE_UNIT_TESTING = 'unit';

    /**
     * @param Credentials $credentials
     * @param string $type
     * @return BanggoodClient
     * @throws InvalidArgumentException
     */
    public function make(Credentials $credentials, string $type): BanggoodClient
    {
        /** @var Client $httpClient */
        $httpClient = new Client();

        switch ($type) {
            case self::TYPE_PRODUCTION:
                return new BanggoodClient($credentials, $httpClient, Banggood::ENDPOINT_PRODUCTION);
            case self::TYPE_SANDBOX:
                return new BanggoodClient($credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);
            case self::TYPE_UNIT_TESTING:
                /** @var Client $mockHttpClient */
                $mockHttpClient = Mockery::mock(Client::class);
                return new BanggoodClient(new Credentials(), $mockHttpClient, Banggood::ENDPOINT_SANDBOX);
            default:
                throw new InvalidArgumentException("Unable to instantiate client of type {$type}");
        }
    }
}