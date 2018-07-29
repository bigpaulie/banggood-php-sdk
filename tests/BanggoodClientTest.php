<?php

namespace bigpaulie\banggod\test;


use bigpaulie\banggod\test\Stubs\ApiResponse;
use bigpaulie\banggood\BanggoodClient;
use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Enum\Banggood;
use bigpaulie\banggood\Exception\BanggoodException;
use bigpaulie\banggood\Exception\BanggoodPurchaseException;
use bigpaulie\banggood\Object\CatList;
use bigpaulie\banggood\Object\Countries;
use bigpaulie\banggood\Object\ImageList;
use bigpaulie\banggood\Object\Order\FailureList;
use bigpaulie\banggood\Object\Order\OrderHistory;
use bigpaulie\banggood\Object\Order\OrderList;
use bigpaulie\banggood\Object\Order\SaleRecordIdList;
use bigpaulie\banggood\Object\Order\TrackInfo;
use bigpaulie\banggood\Object\Order\UserInfo;
use bigpaulie\banggood\Object\PoaList;
use bigpaulie\banggood\Object\ProductList;
use bigpaulie\banggood\Object\ProductPrice;
use bigpaulie\banggood\Object\ShipMethodList;
use bigpaulie\banggood\Object\Stocks;
use bigpaulie\banggood\Object\StockList;
use bigpaulie\banggood\Object\UpdateProductList;
use bigpaulie\banggood\Object\WarehouseList;
use bigpaulie\banggood\Request\GetAccessTokenRequest;
use bigpaulie\banggood\Request\GetCategoryListRequest;
use bigpaulie\banggood\Request\GetCountriesRequest;
use bigpaulie\banggood\Request\GetOrderHistoryRequest;
use bigpaulie\banggood\Request\GetOrderInfoRequest;
use bigpaulie\banggood\Request\GetProductInfoRequest;
use bigpaulie\banggood\Request\GetProductListRequest;
use bigpaulie\banggood\Request\GetProductPriceRequest;
use bigpaulie\banggood\Request\GetProductUpdateListRequest;
use bigpaulie\banggood\Request\GetShipmentsRequest;
use bigpaulie\banggood\Request\GetStocksRequest;
use bigpaulie\banggood\Request\GetTrackInfoRequest;
use bigpaulie\banggood\Request\ImportOrderRequest;
use bigpaulie\banggood\Response\GetAccessTokenResponse;
use bigpaulie\banggood\Response\GetCategoryListResponse;
use bigpaulie\banggood\Response\GetCountriesResponse;
use bigpaulie\banggood\Response\GetOrderHistoryResponse;
use bigpaulie\banggood\Response\GetOrderInfoResponse;
use bigpaulie\banggood\Response\GetProductInfoResponse;
use bigpaulie\banggood\Response\GetProductListResponse;
use bigpaulie\banggood\Response\GetProductPriceResponse;
use bigpaulie\banggood\Response\GetShipmentsResponse;
use bigpaulie\banggood\Response\GetStocksResponse;
use bigpaulie\banggood\Response\GetTrackInfoResponse;
use bigpaulie\banggood\Response\GetProductUpdateListResponse;
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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetProductInfoRequest $request */
        $request = new GetProductInfoRequest();

        /** @var GetProductInfoResponse $response */
        $response = $banggoodClient->getProductInfo($request);

        $this->assertEquals(0, $response->code);
        $this->assertInstanceOf(PoaList::class, $response->poaList[0]);
        $this->assertInstanceOf(WarehouseList::class, $response->warehouseList[0]);
        $this->assertInstanceOf(ImageList::class, $response->imageList);
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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetShipmentsRequest $request */
        $request = new GetShipmentsRequest();

        /** @var GetShipmentsResponse $response */
        $response = $banggoodClient->getShipments($request);

        $this->assertEquals(0, $response->code);
        $this->assertInstanceOf(ShipMethodList::class, $response->shipmentList[0]);
        $this->assertEquals("upsexp_upsexp", $response->shipmentList[0]->shipMethodCode);
        $this->assertEquals("Dgm us mail", $response->shipmentList[0]->shipMethodName);
        $this->assertEquals("3-7", $response->shipmentList[0]->shipDay);
        $this->assertEquals("0", $response->shipmentList[0]->shipFee);
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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var ImportOrderRequest $request */
        $request = new ImportOrderRequest('asdfghjklqwertyuiopzxcvbnm');

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var ImportOrderRequest $request */
        $request = new ImportOrderRequest('asdfghjklqwertyuiopzxcvbnm');

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
     * @param string $stub
     * @return ImportOrderResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @throws \bigpaulie\banggood\Exception\BanggoodPurchaseException
     */
    private function importOrderShouldFailWithException(string $stub = 'importOrder-error')
    {
        /** @var string $json */
        $json = loadJsonStub($stub);

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var ImportOrderRequest $request */
        $request = new ImportOrderRequest('asdfghjklqwertyuiopzxcvbnm');

        /** @var ImportOrderResponse $response */
        $response = $banggoodClient->importOrder($request);
        return $response;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @throws \bigpaulie\banggood\Exception\BanggoodPurchaseException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     * @expectedExceptionMessage Error Account
     */
    public function testImportOrderShouldFailErrorAccount()
    {
        $this->importOrderShouldFailWithException();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodPurchaseException
     * @expectedExceptionCode 1
     * @expectedExceptionMessage Cart question
     */
    public function testImportOrderShouldFailCartQuestion()
    {
        $this->importOrderShouldFailWithException('importOrder-error-cart-question');
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodPurchaseException
     * @expectedExceptionCode 12032
     * @expectedExceptionMessage Error country field
     */
    public function testImportOrderShouldFailErrorCountryField()
    {
        $this->importOrderShouldFailWithException('importOrder-error-country-field');
    }

    /**
     * @throws BanggoodException
     * @throws BanggoodPurchaseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodPurchaseException
     * @expectedExceptionCode 12062
     * @expectedExceptionMessage Duplicate Sale_record_id
     */
    public function testImportOrderShouldFailDuplicateSaleRecordId()
    {
        $this->importOrderShouldFailWithException('importOrder-duplicate-sale-record-id');
    }

    /**
     * @throws BanggoodException
     * @throws BanggoodPurchaseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodPurchaseException
     * @expectedExceptionCode 12063
     * @expectedExceptionMessage The number of prod
     */
    public function testImportOrderShouldFailNumberOfProducts()
    {
        $this->importOrderShouldFailWithException('importOrder-number-of-products');
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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

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
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetOrderInfoRequest $request */
        $request = new GetOrderInfoRequest();

        /** @var GetOrderInfoResponse $response */
        $response = $banggoodClient->getOrderInfo($request);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetTrackInfoShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getTrackInfo-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetTrackInfoRequest $request */
        $request = new GetTrackInfoRequest();

        /** @var GetTrackInfoResponse $response */
        $response = $banggoodClient->getTrackInfo($request);

        $this->assertInstanceOf(GetTrackInfoResponse::class, $response);
        $this->assertEquals(0, $response->code);

        $this->assertInstanceOf(TrackInfo::class, $response->trackInfo[0]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     * @expectedExceptionMessage Error Account
     */
    public function testGetTrackInfoShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getTrackInfo-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetTrackInfoRequest $request */
        $request = new GetTrackInfoRequest();

        /** @var GetTrackInfoResponse $response */
        $response = $banggoodClient->getTrackInfo($request);
    }

    /**
     * This test should pass
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetCountriesShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getCountries-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetCountriesRequest $request */
        $request = new GetCountriesRequest();

        /** @var GetCountriesResponse $response */
        $response = $banggoodClient->getCountries($request);

        $this->assertInstanceOf(GetCountriesResponse::class, $response);
        $this->assertEquals(0, $response->code);

        $this->assertInstanceOf(Countries::class, $response->countries[0]);
        $this->assertEquals(223, $response->countries[0]->countryId);
        $this->assertEquals('United States', $response->countries[0]->countryName);
    }

    /**
     * This test should fail.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     */
    public function testGetCountriesShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getCountries-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetCountriesRequest $request */
        $request = new GetCountriesRequest();

        /** @var GetCountriesResponse $response */
        $response = $banggoodClient->getCountries($request);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetStocksShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getStock-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetStocksRequest $request */
        $request = new GetStocksRequest();

        /** @var GetStocksResponse $response */
        $response = $banggoodClient->getStocks($request);

        $this->assertInstanceOf(GetStocksResponse::class, $response);
        $this->assertEquals(0, $response->code);

        $this->assertInstanceOf(Stocks::class, $response->stocks[0]);
        $this->assertInstanceOf(StockList::class, $response->stocks[0]->stockList[0]);
        $this->assertEquals(556, $response->stocks[0]->stockList[0]->stock);
        $this->assertEquals(
            'In stock, usually dispatched in 1 business day',
            $response->stocks[0]->stockList[0]->stockMsg
        );
    }

    /**
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 12034
     */
    public function testGetStocksShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getStocks-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetStocksRequest $request */
        $request = new GetStocksRequest();

        /** @var GetStocksResponse $response */
        $response = $banggoodClient->getStocks($request);
    }

    /**
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetOrderHistoryShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getOrderHistory-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetOrderHistoryRequest $request */
        $request = new GetOrderHistoryRequest();

        /** @var GetOrderHistoryResponse $response */
        $response = $banggoodClient->getOrderHistory($request);

        $this->assertInstanceOf(GetOrderHistoryResponse::class, $response);
        $this->assertEquals(0, $response->code);

        $this->assertEquals('UD123456CN', $response->trackNumber);

        /** @var OrderHistory $orderHistory */
        $orderHistory = $response->oderHistory[0];
        $this->assertInstanceOf(OrderHistory::class, $orderHistory);
        $this->assertEquals('Payment Pending', $orderHistory->status);
        $this->assertEquals('2016-09-17 03:29:30', $orderHistory->dateAdd);
    }

    /**
     * @throws \Exception
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 31020
     */
    public function testGetOrderHistoryShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getOrderHistory-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetOrderHistoryRequest $request */
        $request = new GetOrderHistoryRequest();

        /** @var GetOrderHistoryResponse $response */
        $response = $banggoodClient->getOrderHistory($request);
    }

    /**
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductUpdateListShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getUpdateProductList-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetProductUpdateListRequest $request */
        $request = new GetProductUpdateListRequest();

        /** @var GetProductUpdateListResponse $response */
        $response = $banggoodClient->getProductUpdateList($request);

        $this->assertInstanceOf(GetProductUpdateListResponse::class, $response);
        $this->assertEquals(0, $response->code);
        $this->assertEquals('2', $response->productTotal);

        $updateProductList = $response->productList[0];
        $this->assertInstanceOf(UpdateProductList::class, $updateProductList);
        $this->assertEquals(1060897, $updateProductList->productId);
        $this->assertEquals('2016-11-24 04:27:23', $updateProductList->modifyDate);
        $this->assertEquals(2, $updateProductList->state);
    }

    /**
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     * @expectedExceptionCode 41010
     */
    public function testGetProductUpdateListShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getUpdateProductList-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetProductUpdateListRequest $request */
        $request = new GetProductUpdateListRequest();

        /** @var GetProductUpdateListResponse $response */
        $response = $banggoodClient->getProductUpdateList($request);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductPriceShouldPass()
    {
        /** @var string $json */
        $json = loadJsonStub('getProductPrice-success');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetProductPriceRequest $request */
        $request = new GetProductPriceRequest();

        /** @var GetProductPriceResponse $response */
        $response = $banggoodClient->getProductPrice($request);

        $this->assertInstanceOf(GetProductPriceResponse::class, $response);
        $this->assertEquals(0, $response->code);
        $productPrice = $response->productPrice;

        $this->assertInstanceOf(ProductPrice::class, $productPrice[0]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     *
     * @expectedException \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductPriceShouldFail()
    {
        /** @var string $json */
        $json = loadJsonStub('getProductPrice-error');

        $httpClient = Mockery::mock(Client::class);
        $httpClient->shouldReceive('send')
            ->once()->andReturn(new ApiResponse($json));

        /** @var BanggoodClient $banggoodClient */
        $banggoodClient = new BanggoodClient($this->credentials, $httpClient, Banggood::ENDPOINT_SANDBOX);

        /** @var GetProductPriceRequest $request */
        $request = new GetProductPriceRequest();

        /** @var GetProductPriceResponse $response */
        $response = $banggoodClient->getProductPrice($request);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}