<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\ShipmentList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class GetShipmentsResponse extends BaseResponse
{
    /**
     * @var ShipmentList[] $shipmentList
     *
     * @Type("array<bigpaulie\banggood\Object\ShipmentList>")
     * @SerializedName("shipment_list")
     */
    public $shipmentList;
}