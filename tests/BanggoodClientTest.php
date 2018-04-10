<?php

namespace bigpaulie\banggod\test;


use bigpaulie\banggod\test\Stubs\ApiResponse;
use bigpaulie\banggood\BanggoodClient;
use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Request\GetAccessTokenRequest;
use bigpaulie\banggood\Response\GetAccessTokenResponse;
use GuzzleHttp\Client;
use Mockery;

/**
 * Class BanggoodClientTest
 * @package bigpaulie\banggod\test
 */
class BanggoodClientTest extends BanggoodTestCase
{
    /** @var Credentials $credentials */
    private $credentials;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        /** @var Credentials $credentials */
        $this->credentials = new Credentials(
            'appid1234',
            'appsecret1234',
            'accesstoken1234'
        );
    }

    /**
     * This test should pass
     * The answer is well formatted and valid
     */
    public function testGetAccessTokenShouldPass()
    {
        /** @var string $json */
        $json = '{"code": 0, "access_token": "a080f2c07304cb33134984cbb4fe0a440430000000014","expires_in": 7200}';

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetAccessTokenRequest $request */
        $request = new GetAccessTokenRequest();

        /** @var GetAccessTokenResponse $response */
        $response = $banggoodClient->getAccessToken($request);

        $this->assertEquals(0, $response->code);
        $this->assertEquals('a080f2c07304cb33134984cbb4fe0a440430000000014', $response->accessToken);
        $this->assertEquals(7200, $response->expresIn);
    }

    /**
     * This test should fail
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     */
    public function testGetAccessTokenShouldFail()
    {
        /** @var string $json */
        $json = '{"code": 31020, "msg": "Error Account", "lang": "en"}';

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetAccessTokenRequest $request */
        $request = new GetAccessTokenRequest();

        /** @var GetAccessTokenResponse $response */
        $response = $banggoodClient->getAccessToken($request);

        $this->assertEquals(31020, $response->code);
        $this->assertEquals("Error Account", $response->msg);
    }

    public function tearDown()/* The :void return type declaration that should be here would cause a BC issue */
    {
        Mockery::close();
    }
}