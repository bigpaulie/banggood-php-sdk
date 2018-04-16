<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class ShipmentList
 * @package bigpaulie\banggood\Object
 */
class ShipmentList
{
    /**
     * Identifier of shipping-method.
     * @var string $shipMethodCode
     *
     * @Type("string")
     * @SerializedName("shipmethod_code")
     */
    public $shipMethodCode;

    /**
     * Name of shipping-method
     * @var string $shipMethodName
     *
     * @Type("string")
     * @SerializedName("shipmethod_name")
     */
    public $shipMethodName;

    /**
     * Timeliness of shipping-method(The unit is day)
     * @var string $shipDay
     *
     * @Type("string")
     * @SerializedName("shipday")
     */
    public $shipDay;

    /**
     * Fee of shipping-method(The unit is USD)
     * @var string $shipFee
     *
     * @Type("string")
     * @SerializedName("shipfee")
     */
    public $shipFee;
}