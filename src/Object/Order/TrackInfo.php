<?php

namespace bigpaulie\banggood\Object\Order;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class TrackInfo
 * @package bigpaulie\banggood\Object\Order
 */
class TrackInfo
{
    /**
     * tracking event
     * @var string $event
     *
     * @Type("string")
     */
    public $event;

    /**
     * Event time（UTC TimeZone)
     * @var string $time
     *
     * @Type("string")
     */
    public $time;
}