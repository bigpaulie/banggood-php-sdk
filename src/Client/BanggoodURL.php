<?php

namespace bigpaulie\banggood\Client;

use bigpaulie\banggood\Enum\Banggood;
use bigpaulie\banggood\Exception\BanggoodException;

/**
 * Class BanggoodURL
 * @package bigpaulie\banggood\Client
 */
class BanggoodURL
{
    /**
     * @var array $urls
     */
    private static $urls = [
        'getProductPrice' => 'product/getProductPrice',
        'getAccessToken' => 'getAccessToken',
        'getCategoryList' => 'category/getCategoryList',
        'getProductList' => 'product/getProductList',
        'getProductInfo' => 'product/getProductInfo',
        'getShipments' => 'product/getShipments',
        'importOrder' => 'order/importOrder',
        'getOrderInfo' => 'order/getOrderInfo',
        'getTrackInfo' => 'order/getTrackInfo',
        'getCountries' => 'common/getCountries',
        'getStocks' => 'product/getStocks',
        'getOrderHistory' => 'order/getOrderHistory',
        'getProductUpdateList' => 'product/getProductUpdateList'
    ];

    /**
     * @param string $endpoint
     * @param array $parameters
     * @param string $environment
     * @return string
     * @throws BanggoodException
     */
    public static function compose(string $endpoint, array $parameters = [], string $environment): string
    {
        if (!array_key_exists($endpoint, self::$urls)) {
            throw new BanggoodException("Unknown API endpoint {$endpoint}");
        }

        switch ($environment) {
            case Banggood::ENDPOINT_PRODUCTION:
                return sprintf(
                    '%s/%s?%s', Banggood::ENDPOINT_PRODUCTION,
                    self::$urls[$endpoint],
                    http_build_query($parameters)
                );
            case Banggood::ENDPOINT_SANDBOX:
                $parameters['apiTest'] = 1;
                return sprintf(
                    '%s/%s?%s', Banggood::ENDPOINT_SANDBOX,
                    self::$urls[$endpoint],
                    http_build_query($parameters)
                );
            default:
                throw new BanggoodException("Unknown API environment {$environment}");
        }
    }
}