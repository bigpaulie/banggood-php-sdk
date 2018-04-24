<?php

namespace bigpaulie\banggood\Object;


use bigpaulie\banggood\Object\WarehouseList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class ProductPrice
 * @package bigpaulie\banggood\Object\Order
 */
class ProductPrice
{
    /**
     * @var string $productId
     *
     * @Type("string")
     * @SerializedName("product_id")
     */
    public $productId;

    /**
     * @var string $poaId
     *
     * @Type("string")
     * @SerializedName("poa_id")
     */
    public $poaId;

    /**
     * @var WarehouseList[] $warehouse
     *
     * @Type("array<bigpaulie\banggood\Object\WarehouseList>")
     */
    public $warehouse;
}