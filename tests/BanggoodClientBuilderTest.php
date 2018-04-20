<?php

namespace bigpaulie\banggod\test;


use bigpaulie\banggood\BanggoodClient;
use bigpaulie\banggood\BanggoodClientBuilder;
use bigpaulie\banggood\Client\Credentials;

/**
 * Class BanggoodClientBuilderTest
 * @package bigpaulie\banggod\test
 */
class BanggoodClientBuilderTest extends BanggoodTestCase
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
    public function testBuildProductionClientShouldPass()
    {
        $client = (new BanggoodClientBuilder())
            ->credentials($this->credentials)
            ->environment(BanggoodClientBuilder::TYPE_PRODUCTION)
            ->build();

        $this->assertInstanceOf(BanggoodClient::class, $client);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\InvalidArgumentException
     */
    public function testBuildSandboxClientShouldPass()
    {
        $client = (new BanggoodClientBuilder())
            ->credentials($this->credentials)
            ->environment(BanggoodClientBuilder::TYPE_SANDBOX)
            ->build();

        $this->assertInstanceOf(BanggoodClient::class, $client);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\InvalidArgumentException
     *
     * @expectedException \bigpaulie\banggood\Exception\InvalidArgumentException
     */
    public function testBuildUnknownClientShouldFail()
    {
        $client = (new BanggoodClientBuilder())
            ->credentials(new Credentials())
            ->environment('unknown')
            ->build();
    }
}