<?php

namespace bigpaulie\banggod\test;


use bigpaulie\banggod\test\Stubs\ApiResponse;
use bigpaulie\banggood\BanggoodClient;
use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Object\CatList;
use bigpaulie\banggood\Object\ImageList;
use bigpaulie\banggood\Object\Order\FailureList;
use bigpaulie\banggood\Object\Order\OrderList;
use bigpaulie\banggood\Object\Order\SaleRecordIdList;
use bigpaulie\banggood\Object\Order\UserInfo;
use bigpaulie\banggood\Object\PoaList;
use bigpaulie\banggood\Object\ProductList;
use bigpaulie\banggood\Object\ShipmentList;
use bigpaulie\banggood\Object\WarehouseList;
use bigpaulie\banggood\Request\GetAccessTokenRequest;
use bigpaulie\banggood\Request\GetCategoryListRequest;
use bigpaulie\banggood\Request\GetOrderInfoRequest;
use bigpaulie\banggood\Request\GetProductInfoRequest;
use bigpaulie\banggood\Request\GetProductListRequest;
use bigpaulie\banggood\Request\GetShipmentsRequest;
use bigpaulie\banggood\Request\ImportOrderRequest;
use bigpaulie\banggood\Response\GetAccessTokenResponse;
use bigpaulie\banggood\Response\GetCategoryListResponse;
use bigpaulie\banggood\Response\GetOrderInfoResponse;
use bigpaulie\banggood\Response\GetProductInfoResponse;
use bigpaulie\banggood\Response\GetProductListResponse;
use bigpaulie\banggood\Response\GetShipmentsResponse;
use bigpaulie\banggood\Response\ImportOrderResponse;
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
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
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
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
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

    /**
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testProductInfoShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getProductInfo-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetProductInfoRequest $request */
        $request = new GetProductInfoRequest();

        /** @var GetProductInfoResponse $response */
        $response = $banggoodClient->getProductInfo($request);

        $this->assertEquals(0, $response->code);
        $this->assertInstanceOf(PoaList::class, $response->poaList[0]);
        $this->assertInstanceOf(WarehouseList::class, $response->warehouseList[0]);
        $this->assertInstanceOf(ImageList::class, $response->imageList[0]);
        $this->assertEquals("Digoo Series Goods", $response->productName);
    }

    /**
     * @throws \Exception
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 12034
     */
    public function testProductInfoShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getProductInfo-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetProductInfoRequest $request */
        $request = new GetProductInfoRequest();

        /** @var GetProductInfoResponse $response */
        $response = $banggoodClient->getProductInfo($request);
    }

    /**
     * This test should pass
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetShipmentsShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getShipments-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetShipmentsRequest $request */
        $request = new GetShipmentsRequest();

        /** @var GetShipmentsResponse $response */
        $response = $banggoodClient->getShipments($request);

        $this->assertEquals(0, $response->code);
        $this->assertInstanceOf(ShipmentList::class, $response->shipmentList[0]);
        $this->assertEquals("cndhl_cndhl", $response->shipmentList[0]->shipMethodCode);
        $this->assertEquals("Expedited Shipping Service", $response->shipmentList[0]->shipMethodName);
        $this->assertEquals("5-8 business days", $response->shipmentList[0]->shipDay);
        $this->assertEquals("10.92", $response->shipmentList[0]->shipFee);
    }

    /**
     * This test should fail
     * @throws \Exception
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     * @expectedExceptionMessage Error Account
     */
    public function testGetShipmentsShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getShipments-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetShipmentsRequest $request */
        $request = new GetShipmentsRequest();

        /** @var GetShipmentsResponse $response */
        $response = $banggoodClient->getShipments($request);
    }

    public function testImportOrderShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('importOrder-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var ImportOrderRequest $request */
        $request = new ImportOrderRequest();

        /** @var ImportOrderResponse $response */
        $response = $banggoodClient->importOrder($request);

        $this->assertEquals(0, $response->code);
        $this->assertEquals('test007', $response->saleRecordId);
        $this->assertEquals(1, $response->productTotal);
        $this->assertEquals(1, $response->successTotal);
        $this->assertEquals(0, $response->failureTotal);
    }

    public function testImportOrderShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('importOrder-failure');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var ImportOrderRequest $request */
        $request = new ImportOrderRequest();

        /** @var ImportOrderResponse $response */
        $response = $banggoodClient->importOrder($request);

        $this->assertEquals(0, $response->code);
        $this->assertEquals('test006', $response->saleRecordId);
        $this->assertEquals(1, $response->productTotal);
        $this->assertEquals(0, $response->successTotal);
        $this->assertEquals(1, $response->failureTotal);

        $this->assertInstanceOf(FailureList::class, $response->failureList[0]);
        $this->assertEquals('992047', $response->failureList[0]->productId);
        $this->assertEquals('2', $response->failureList[0]->quantity);
        $this->assertEquals('CN', $response->failureList[0]->warehouse);
        $this->assertEquals('45,2', $response->failureList[0]->poaId);
        $this->assertEquals('airmail_airmail', $response->failureList[0]->shipMethodCode);
        $this->assertEquals('Error poa', $response->failureList[0]->errorDesc);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     * @expectedExceptionMessage Error Account
     */
    public function testImportOrderShouldFailWithException()
    {
        /** @var string $json */
        $json = loadJsonStub('importOrder-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var ImportOrderRequest $request */
        $request = new ImportOrderRequest();

        /** @var ImportOrderResponse $response */
        $response = $banggoodClient->importOrder($request);
    }

    /**
     * This test should pass
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetOrderInfoShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getOrderInfo-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetOrderInfoRequest $request */
        $request = new GetOrderInfoRequest();

        /** @var GetOrderInfoResponse $response */
        $response = $banggoodClient->getOrderInfo($request);

        $this->assertInstanceOf(GetOrderInfoResponse::class, $response);
        $this->assertEquals(0, $response->code);

        $this->assertInstanceOf(SaleRecordIdList::class, $response->saleRecordIdList[0]);
        $this->assertInstanceOf(OrderList::class, $response->saleRecordIdList[0]->orderList[0]);
        $this->assertInstanceOf(UserInfo::class, $response->saleRecordIdList[0]->userInfo[0]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     * @expectedExceptionMessage Error Account
     */
    public function testGetOrderInfoShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getOrderInfo-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient);

        /** @var GetOrderInfoRequest $request */
        $request = new GetOrderInfoRequest();

        /** @var GetOrderInfoResponse $response */
        $response = $banggoodClient->getOrderInfo($request);
    }

    public function testGetTrackInfoShouldPass()
    {

    }

    public function testGetTrackInfoShouldFail()
    {

    }

    public function testGetCountriesShouldPass()
    {

    }

    public function testGetCountriesShouldFail()
    {

    }

    public function testGetStocksShouldPass()
    {

    }

    public function testGetStocksShouldFail()
    {

    }

    public function testGetOrderHistoryShouldPass()
    {

    }

    public function testGetOrderHistoryShouldFail()
    {

    }

    public function testGetProductUpdateListShouldPass()
    {

    }

    public function testGetProductUpdateListShouldFail()
    {

    }

    public function tearDown()/* The :void return type declaration that should be here would cause a BC issue */
    {
        Mockery::close();
    }
}