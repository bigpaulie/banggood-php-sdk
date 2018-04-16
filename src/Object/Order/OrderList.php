<?php

namespace bigpaulie\banggood\Object\Order;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class OrderList
 * @package bigpaulie\banggood\Object\Order
 */
class OrderList
{
    /**
     * @var string $orderId
     *
     * @Type("string")
     * @SerializedName("order_id")
     */
    public $orderId;

    /**
     * @var string $status
     *
     * @Type("string")
     */
    public $status;

    /**
     * @var float $totalAmount
     *
     * @Type("float")
     * @SerializedName("total_amount")
     */
    public $totalAmount;

    /**
     * @var string $currency
     *
     * @Type("string")
     */
    public $currency;

    /**
     * @var string $shipMethodCode
     *
     * @Type("string")
     * @SerializedName("shipmethod_code")
     */
    public $shipMethodCode;

    /**
     * @var float $subAmount
     *
     * @Type("float")
     * @SerializedName("sub_amount")
     */
    public $subAmount;

    /**
     * @var float $dsDiscount
     *
     * @Type("float")
     * @SerializedName("ds_discount")
     */
    public $dsDiscount;

    /**
     * @var float $shipFee
     *
     * @Type("float")
     * @SerializedName("shipfee")
     */
    public $shipFee;

    /**
     * @var float $shipInsurance
     *
     * @Type("float")
     * @SerializedName("ship_insurance")
     */
    public $shipInsurance;

    /**
     * @var float $tariffInsurance
     *
     * @Type("float")
     * @SerializedName("tariff_insurance")
     */
    public $tariffInsurance;

    /**
     * @var ProductList[] $productList
     *
     * @Type("array<bigpaulie\banggood\Object\Order\ProductList>")
     */
    public $productList;
}