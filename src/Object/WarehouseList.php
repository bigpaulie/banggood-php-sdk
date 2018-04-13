<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class WarehouseList
 * @package bigpaulie\banggood\Object
 */
class WarehouseList
{
    /**
     * The name of warehouse that store products
     * @var string $warehouse
     *
     * @Type("string")
     */
    public $warehouse;

    /**
     * The product that has been stored in this warehouse corresponding to the price of the product(The unit is USD)
     * @var float $warehousePrice
     *
     * @Type("float")
     * @SerializedName("warehouse_price")
     */
    public $warehousePrice;
}