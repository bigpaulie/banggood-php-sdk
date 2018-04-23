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
     * Credentials constructor.
     * @param null|string $appId
     * @param null|string $appSecret
     */
    public function __construct($appId = null, $appSecret = null)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
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
}