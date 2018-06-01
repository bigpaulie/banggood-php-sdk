<?php

namespace bigpaulie\banggood\Response;


use bigpaulie\banggood\Object\ProductPrice;
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
     * @var ProductPrice[] $productPrice
     *
     * @Type("array<bigpaulie\banggood\Object\ProductPrice>")
     * @SerializedName("productPrice")
     */
    public $productPrice;
}