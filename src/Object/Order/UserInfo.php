<?php

namespace bigpaulie\banggood\Object\Order;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class UserInfo
 * @package bigpaulie\banggood\Object\Order
 */
class UserInfo
{
    /**
     * @var string $deliveryName
     *
     * @Type("string")
     * @SerializedName("delivery_name")
     */
    public $deliveryName;

    /**
     * @var string $deliveryCountry
     *
     * @Type("string")
     * @SerializedName("delivery_country")
     */
    public $deliveryCountry;

    /**
     * @var string $deliveryState
     *
     * @Type("string")
     * @SerializedName("delivery_state")
     */
    public $deliveryState;

    /**
     * @var string $deliveryCity
     *
     * @Type("string")
     * @SerializedName("delivery_city")
     */
    public $deliveryCity;

    /**
     * @var string $deliveryStreetAddress
     *
     * @Type("string")
     * @SerializedName("delivery_street_address")
     */
    public $deliveryStreetAddress;

    /**
     * @var string $deliveryStreetAddress2
     *
     * @Type("string")
     * @SerializedName("delivery_street_address2")
     */
    public $deliveryStreetAddress2;
}