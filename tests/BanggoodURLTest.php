<?php

namespace bigpaulie\banggod\test;

use bigpaulie\banggood\Client\BanggoodURL;
use bigpaulie\banggood\Enum\Banggood;

/**
 * Class BanggoodURLTest
 * @package bigpaulie\banggod\test
 */
class BanggoodURLTest extends BanggoodTestCase
{
    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductPriceProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductPrice',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/product/GetProductPrice?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductPriceSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductPrice',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/product/GetProductPrice?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetAccessTokenProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getAccessToken',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/getAccessToken?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetAccessTokenSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getAccessToken',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/getAccessToken?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetCategoryListProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getCategoryList',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/category/getCategoryList?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetCategoryListSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getCategoryList',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/category/getCategoryList?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductListProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductList',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/product/getProductList?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductListSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductList',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/product/getProductList?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductInfoProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductInfo',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/product/getProductInfo?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductInfoSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductInfo',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/product/getProductInfo?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetShipmentsProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getShipments',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/product/getShipments?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetShipmentsSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getShipments',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/product/getShipments?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testImportOrderProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'importOrder',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/order/importOrder?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testImportOrderSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'importOrder',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/order/importOrder?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetOrderInfoProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getOrderInfo',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/order/getOrderInfo?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetOrderInfoSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getOrderInfo',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/order/getOrderInfo?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetTrackInfoProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getTrackInfo',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/order/getTrackInfo?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetTrackInfoSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getTrackInfo',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/order/getTrackInfo?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetCountriesProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getCountries',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/common/getCountries?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetCountriesSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getCountries',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/common/getCountries?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetStocksProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getStocks',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/product/getStocks?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetStocksSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getStocks',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/product/getStocks?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetOrderHistoryProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getOrderHistory',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/order/getOrderHistory?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetOrderHistorySandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getOrderHistory',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/order/getOrderHistory?unit=1&apiTest=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductUpdateListProductionComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductUpdateList',
            ['unit' => 1],
            Banggood::ENDPOINT_PRODUCTION
        );
        $this->assertEquals('https://api.banggood.com/product/getProductUpdateList?unit=1', $actual);
    }

    /**
     * @throws \bigpaulie\banggood\Exception\BanggoodException
     */
    public function testGetProductUpdateListSandboxComposerShouldPass()
    {
        $actual = BanggoodURL::compose(
            'getProductUpdateList',
            ['unit' => 1],
            Banggood::ENDPOINT_SANDBOX
        );
        $this->assertEquals('https://apibeta.banggood.com/product/getProductUpdateList?unit=1&apiTest=1', $actual);
    }
}