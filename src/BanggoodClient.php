<?php

namespace bigpaulie\banggood;
use bigpaulie\banggood\Request\GetAccessTokenRequest;
use bigpaulie\banggood\Response\GetAccessTokenResponse;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class BanggoodClient
 * @package bigpaulie\banggood
 */
class BanggoodClient
{
    /**
     * @var string $appId
     */
    private $appId;

    /**
     * @var string $appSecret
     */
    private $appSecret;

    /**
     * @var null|string $token
     */
    private $token = null;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * BanggoodClient constructor.
     * @param string $appId
     * @param string $appSecret
     * @param null|string $token
     */
    public function __construct(string $appId, string $appSecret, $token = null)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
        $this->token = $token;

        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )->build();
    }

    public function getAccessToken(GetAccessTokenRequest $request):GetAccessTokenResponse
    {

    }
}