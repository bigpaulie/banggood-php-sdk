<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\ShipMethodList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class GetShipmentsResponse extends BaseResponse
{
    /**
     * @var ShipMethodList[] $shipmentList
     *
     * @Type("array<bigpaulie\banggood\Object\ShipMethodList>")
     * @SerializedName("shipmethod_list")
     */
    public $shipmentList;
}