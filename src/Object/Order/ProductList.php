<?php

namespace bigpaulie\banggood\Object\Order;

use bigpaulie\banggood\Interfaces\Arrayable;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class ProductList
 * @package bigpaulie\banggood\Object\Order
 */
class ProductList implements Arrayable
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
     * @SerializedName("Warehouse")
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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'product_id' => $this->productId,
            'poa_id' => $this->poaId,
            'quantity' => $this->quantity,
            'warehouse' => $this->warehouse,
            'shipmethod_code' => $this->shipMethodCode
        ];
    }
}