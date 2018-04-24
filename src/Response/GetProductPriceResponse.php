<?php

namespace bigpaulie\banggood\Response;


use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetProductPriceResponse
 * @package bigpaulie\banggood\Response
 */
class GetProductPriceResponse extends BaseResponse
{
    /**
     * @var string $currency
     *
     * @Type("string")
     */
    public $currency;

    /**
     * @var array $productPrice
     *
     * @Type("array<bigpaulie\banggood\Object\ProductPrice>")
     * @SerializedName("product_price")
     */
    public $productPrice;
}