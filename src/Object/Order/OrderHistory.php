<?php

namespace bigpaulie\banggood\Object\Order;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class OrderHistory
 * @package bigpaulie\banggood\Object\Order
 */
class OrderHistory
{
    /**
     * order status or event
     * @var string $status
     *
     * @Type("string")
     */
    public $status;

    /**
     * Event time
     * @var string $dateAdd
     *
     * @Type("string")
     * @SerializedName("date_add")
     */
    public $dateAdd;
}