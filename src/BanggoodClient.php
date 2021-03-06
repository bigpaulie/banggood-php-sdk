<?php

namespace bigpaulie\banggood;

use bigpaulie\banggood\Client\BaseClient;
use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Exception\BanggoodException;
use bigpaulie\banggood\Exception\BanggoodPurchaseException;
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
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class BanggoodClient
 * @package bigpaulie\banggood
 */
class BanggoodClient extends BaseClient
{
    /**
     * BanggoodClient constructor.
     * @param Credentials $credentials
     * @param Client $client
     * @param string $environment
     */
    public function __construct(Credentials $credentials, Client $client, string $environment)
    {
        /** @var Client http */
        $this->http = $client;

        /** @var Credentials credentials */
        $this->credentials = $credentials;

        /** @var string environment */
        $this->environment = $environment;

        /** @var Serializer serializer */
        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )->build();
    }

    /**
     * @param GetAccessTokenRequest $request
     * @return GetAccessTokenResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessToken(GetAccessTokenRequest $request):GetAccessTokenResponse
    {
        /** @var GetAccessTokenResponse $response */
        $response = $this->request(__FUNCTION__, $request, false);
        return $response;
    }

    /**
     * @param GetCategoryListRequest $request
     * @return GetCategoryListResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=9
     */
    public function getCategoryList(GetCategoryListRequest $request): GetCategoryListResponse
    {
        /** @var GetCategoryListResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetProductListRequest $request
     * @return GetProductListResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=10
     */
    public function getProductList(GetProductListRequest $request): GetProductListResponse
    {
        /** @var GetProductListResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetProductInfoRequest $request
     * @return GetProductInfoResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=11
     */
    public function getProductInfo(GetProductInfoRequest $request): GetProductInfoResponse
    {
        /** @var GetProductInfoResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetShipmentsRequest $request
     * @return GetShipmentsResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=12
     */
    public function getShipments(GetShipmentsRequest $request): GetShipmentsResponse
    {
        /** @var GetShipmentsResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetOrderInfoRequest $request
     * @return GetOrderInfoResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=15
     */
    public function getOrderInfo(GetOrderInfoRequest $request): GetOrderInfoResponse
    {
        /** @var GetOrderInfoResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param ImportOrderRequest $request
     * @return ImportOrderResponse
     * @throws BanggoodException
     * @throws BanggoodPurchaseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=14
     */
    public function importOrder(ImportOrderRequest $request): ImportOrderResponse
    {
        /** @var ImportOrderResponse $response */
        $response = $this->request(__FUNCTION__, $request, true, true);
        return $response;
    }

    /**
     * @param GetTrackInfoRequest $request
     * @return GetTrackInfoResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=16
     */
    public function getTrackInfo(GetTrackInfoRequest $request): GetTrackInfoResponse
    {
        /** @var GetTrackInfoResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetCountriesRequest $request
     * @return GetCountriesResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCountries(GetCountriesRequest $request): GetCountriesResponse
    {
        /** @var GetCountriesResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetStocksRequest $request
     * @return GetStocksResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStocks(GetStocksRequest $request): GetStocksResponse
    {
        /** @var GetStocksResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetOrderHistoryRequest $request
     * @return GetOrderHistoryResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=17
     */
    public function getOrderHistory(GetOrderHistoryRequest $request): GetOrderHistoryResponse
    {
        /** @var GetOrderHistoryResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetProductUpdateListRequest $request
     * @return GetProductUpdateListResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=24
     */
    public function getProductUpdateList(GetProductUpdateListRequest $request): GetProductUpdateListResponse
    {
        /** @var GetProductUpdateListResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }

    /**
     * @param GetProductPriceRequest $request
     * @return GetProductPriceResponse
     * @throws BanggoodException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=300000016
     */
    public function getProductPrice(GetProductPriceRequest $request): GetProductPriceResponse
    {
        /** @var GetProductPriceResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }
}