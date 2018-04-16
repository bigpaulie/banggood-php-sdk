<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class StockList
 * @package bigpaulie\banggood\Object
 */
class StockList
{
    /**
     * A combination of product attribute , is equal to one poa
     * @var int $poaId
     *
     * @Type("integer")
     * @SerializedName("poa_id")
     */
    public $poaId;

    /**
     * one poa to this product
     * @var string $poa
     *
     * @Type("string")
     */
    public $poa;

    /**
     * The amount of inventory（Stock quantity differ from each warehouse or poa(poa_id).）
     * @var string $stock
     *
     * @Type("string")
     */
    public $stock;

    /**
     * Delivery description in this stock
     * @var string $stockMsg
     *
     * @Type("string")
     * @SerializedName("stock_msg")
     */
    public $stockMsg;
}