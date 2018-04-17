<?php

namespace bigpaulie\banggod\test;


use bigpaulie\banggood\BanggoodClient;
use bigpaulie\banggood\BanggoodClientFactory;
use bigpaulie\banggood\Client\Credentials;

/**
 * Class BanggoodClientFactoryTest
 * @package bigpaulie\banggod\test
 */
class BanggoodClientFactoryTest extends BanggoodTestCase
{
    /**
     * @var Credentials $credentials
     */
    private $credentials;

    /**
     * Setup tests
     */
    public function setUp()
    {
        $this->credentials = new Credentials();
        parent::setUp();
    }

    /**
     * @throws \bigpaulie\banggood\Exception\InvalidArgumentException
     */
    public function testMakeProductionClientShouldPass()
    {
        $client = (new BanggoodClientFactory())
            ->make($this->credentials, BanggoodClientFactory::TYPE_PRODUCTION);

        $this->assertInstanceOf(BanggoodClient::class, $client);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\InvalidArgumentException
     */
    public function testMakeSandboxClientShouldPass()
    {
        $client = (new BanggoodClientFactory())
            ->make($this->credentials, BanggoodClientFactory::TYPE_SANDBOX);

        $this->assertInstanceOf(BanggoodClient::class, $client);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\InvalidArgumentException
     *
     * @expectedException \bigpaulie\banggood\Exception\InvalidArgumentException
     */
    public function testMakeUnknownClientShouldFail()
    {
        $client = (new BanggoodClientFactory())
            ->make($this->credentials, 'unknown');
    }
}