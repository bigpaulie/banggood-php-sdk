<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class Stocks
 * @package bigpaulie\banggood\Object
 */
class Stocks
{
    /**
     * The name of warehouse that store this product
     * @var string $warehouse
     *
     * @Type("string")
     */
    public $warehouse;

    /**
     * Product stock information
     * @var StockList[] $stockList
     *
     * @Type("array<bigpaulie\banggood\Object\StockList>")
     * @SerializedName("stock_list")
     */
    public $stockList;
}