<?php

namespace bigpaulie\banggood;


use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Enum\Banggood;
use bigpaulie\banggood\Exception\InvalidArgumentException;
use GuzzleHttp\Client;
use Mockery;

/**
 * Class BanggoodClientBuilder
 * This is a simple factory class to help you create the BanggoodClient easily
 *
 * @package bigpaulie\banggood
 */
class BanggoodClientBuilder
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
     * @var Credentials|null $credentials
     */
    private $credentials = null;

    /**
     * @var string|null $environment
     */
    private $environment = null;

    /**
     * @param Credentials $credentials
     * @return BanggoodClientBuilder
     */
    public function credentials(Credentials $credentials): BanggoodClientBuilder
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * @param string $environment
     * @return BanggoodClientBuilder
     */
    public function environment(string $environment): BanggoodClientBuilder
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @return BanggoodClient
     * @throws InvalidArgumentException
     */
    public function build(): BanggoodClient
    {
        /** @var Client $httpClient */
        $httpClient = new Client();

        if (is_null($this->credentials)) {
            throw new InvalidArgumentException('Cannot build client, credentials are required');
        }

        switch ($this->environment) {
            case self::TYPE_PRODUCTION:
                return new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_PRODUCTION);
            case self::TYPE_SANDBOX:
                return new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);
            case self::TYPE_UNIT_TESTING:
                /** @var Client $mockHttpClient */
                $mockHttpClient = Mockery::mock(Client::class);
                return new BanggoodClient(new Credentials(), $mockHttpClient, Banggood::ENDPOINT_SANDBOX);
            default:
                throw new InvalidArgumentException("Unable to instantiate client of type {$this->environment}");
        }
    }
}