<?php

namespace bigpaulie\banggood\Client;


class Credentials
{
    /**
     * @var string|null $appId
     */
    private $appId;

    /**
     * @var string|null $appSecret
     */
    private $appSecret;

    /**
     * @var string|null $accessToken
     */
    private $accessToken;

    /**
     * Credentials constructor.
     * @param null|string $appId
     * @param null|string $appSecret
     * @param null|string $accessToken
     */
    public function __construct($appId = null, $appSecret = null, $accessToken = null)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
        $this->accessToken = $accessToken;
    }

    /**
     * @return null|string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return null|string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @return null|string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}