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
     * @var string $poaId
     *
     * @Type("string")
     * @SerializedName("poa_id")
     */
    public $poaId;

    /**
     * @var float
     *
     * @Type("float")
     */
    public $price;
}