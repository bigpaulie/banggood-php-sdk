<?php

namespace bigpaulie\banggood;

use bigpaulie\banggood\Client\BaseClient;
use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Exception\BanggoodException;
use bigpaulie\banggood\Request\GetAccessTokenRequest;
use bigpaulie\banggood\Request\GetCategoryListRequest;
use bigpaulie\banggood\Request\GetProductInfoRequest;
use bigpaulie\banggood\Request\GetProductListRequest;
use bigpaulie\banggood\Request\GetShipmentsRequest;
use bigpaulie\banggood\Request\ImportOrderRequest;
use bigpaulie\banggood\Response\GetAccessTokenResponse;
use bigpaulie\banggood\Response\GetCategoryListResponse;
use bigpaulie\banggood\Response\GetProductInfoResponse;
use bigpaulie\banggood\Response\GetProductListResponse;
use bigpaulie\banggood\Response\GetShipmentsResponse;
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
     */
    public function __construct(Credentials $credentials, Client $client)
    {
        /** @var Client http */
        $this->http = $client;

        /** @var Credentials credentials */
        $this->credentials = $credentials;

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
        $response = $this->request(__FUNCTION__, $request);
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
     * @param ImportOrderRequest $request
     * @return ImportOrderResponse
     * @throws BanggoodException
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
}