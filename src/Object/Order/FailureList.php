<?php

namespace bigpaulie\banggood\Object\Order;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class FailureList
 * @package bigpaulie\banggood\Object\Order
 */
class FailureList
{
    /**
     * Identifier of product, from GetProductList API
     * @var string $productId
     *
     * @Type("string")
     * @SerializedName("product_id")
     */
    public $productId;

    /**
     * Identifier of product attributes value, and this field is from GetProductInfo API
     * (Use "," to separate different poa_id)
     * @var string $poaId
     *
     * @Type("string")
     * @SerializedName("poa_id")
     */
    public $poaId;

    /**
     * Total number of products user bought
     * @var int $quantity
     *
     * @Type("integer")
     */
    public $quantity;

    /**
     * warehouse of products user bought, and this field is from GetProductInfo API
     * @var string $warehouse
     *
     * @Type("string")
     * @SerializedName("warehouse")
     */
    public $warehouse;

    /**
     * Shipping method user chose, and this field is from the GetShipments API
     * @var string $shipMethodCode
     *
     * @Type("string")
     * @SerializedName("shipmethod_code")
     */
    public $shipMethodCode;

    /**
     * Cause of failure
     * @var string $errorDesc
     *
     * @Type("string")
     * @SerializedName("error_desc")
     */
    public $errorDesc;
}