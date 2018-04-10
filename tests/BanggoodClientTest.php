<?php

namespace bigpaulie\banggod\test;


use bigpaulie\banggod\test\Stubs\ApiResponse;
use bigpaulie\banggood\BanggoodClient;
use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Object\CatList;
use bigpaulie\banggood\Object\ProductList;
use bigpaulie\banggood\Request\GetAccessTokenRequest;
use bigpaulie\banggood\Request\GetCategoryListRequest;
use bigpaulie\banggood\Request\GetProductListRequest;
use bigpaulie\banggood\Response\GetAccessTokenResponse;
use bigpaulie\banggood\Response\GetCategoryListResponse;
use bigpaulie\banggood\Response\GetProductListResponse;
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
     *
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
     *
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

    /**
     * This test should pass
     *
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetCategoryListShouldPass()
    {
        /** @var string $json */
        $json = '{"code": 0, "page": 1, "page_total": 6, "cat_total": 2520, "page_size": 500, "lang": "en", "cat_list": [{"cat_id": "22", "cat_name": "iPod accessories", "parent_id": "1696"}]}';

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetCategoryListRequest $request */
        $request = new GetCategoryListRequest();

        /** @var GetCategoryListResponse $response */
        $response = $banggoodClient->getCategoryList($request);

        $this->assertEquals(0, $response->code);
        $this->assertTrue(is_array($response->catList));
        $this->assertInstanceOf(CatList::class, $response->catList[0]);
        $this->assertEquals(22, $response->catList[0]->catId);
        $this->assertEquals('iPod accessories', $response->catList[0]->catName);
        $this->assertEquals(1696, $response->catList[0]->parentId);
    }

    /**
     * This test should fail
     *
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 11020
     */
    public function testGetCategoryListShouldFail()
    {
        /** @var string $json */
        $json = '{"code": 11020, "msg": "access_token is empty", "lang": "en"}';

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetCategoryListRequest $request */
        $request = new GetCategoryListRequest();

        /** @var GetCategoryListResponse $response */
        $response = $banggoodClient->getCategoryList($request);

        $this->assertEquals(31020, $response->code);
        $this->assertEquals("Error Account", $response->msg);
    }

    /**
     * This test should pass
     *
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductListShouldPass()
    {
        /** @var string $json */
        $json = '{"code": 0, "page": 1, "page_total": 10, "product_total": 188, "page_size": 5, "lang": "en", "product_list": [{"product_id": "1083552", "cat_id": 1753, "product_name": "WLtoys 24438 1/24 2.4G 4WD Rock Crawler RC Car", "img": "https://img1.banggood.com/thu/view", "meta_desc": "WLtoys 24438 1/24 2.4G 4WD Rock Crawler RC Car", "add_date": "2016-09-01 09:59:40", "modify_date": "2016-09-01 09:59:53"}]}';

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetProductListRequest $request */
        $request = new GetProductListRequest();

        /** @var GetProductListResponse $response */
        $response = $banggoodClient->getProductList($request);

        $this->assertEquals(0, $response->code);
        $this->assertTrue(is_array($response->productList));
        $this->assertInstanceOf(ProductList::class, $response->productList[0]);
        $this->assertEquals(
            'WLtoys 24438 1/24 2.4G 4WD Rock Crawler RC Car',
            $response->productList[0]->productName
        );
    }

    /**
     * This test should fail
     *
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 12022
     */
    public function testGetProductListShouldFail()
    {
        /** @var string $json */
        $json = '{"code": 12022, "msg": "Cannot query by this cat_id", "lang": "en"}';

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetProductListRequest $request */
        $request = new GetProductListRequest();

        /** @var GetProductListResponse $response */
        $response = $banggoodClient->getProductList($request);
    }

    public function tearDown()/* The :void return type declaration that should be here would cause a BC issue */
    {
        Mockery::close();
    }
}