<?php

namespace bigpaulie\banggood;

use bigpaulie\banggood\Client\BaseClient;
use bigpaulie\banggood\Client\Credentials;
use bigpaulie\banggood\Exception\BanggoodException;
use bigpaulie\banggood\Request\GetAccessTokenRequest;
use bigpaulie\banggood\Request\GetCategoryListRequest;
use bigpaulie\banggood\Response\GetAccessTokenResponse;
use bigpaulie\banggood\Response\GetCategoryListResponse;
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
     *
     * @see https://api.banggood.com/index.php?com=document&article_id=9
     */
    public function getCategoryList(GetCategoryListRequest $request): GetCategoryListResponse
    {
        /** @var GetCategoryListResponse $response */
        $response = $this->request(__FUNCTION__, $request);
        return $response;
    }
}