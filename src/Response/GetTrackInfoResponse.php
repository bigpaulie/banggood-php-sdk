<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\Order\TrackInfo;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetTrackInfoResponse
 * @package bigpaulie\banggood\Response
 */
class GetTrackInfoResponse extends BaseResponse
{
    /**
     * The tracking information of order
     * @var TrackInfo[] $trackInfo
     *
     * @Type("array<bigpaulie\banggood\Object\Order\TrackInfo>")
     * @SerializedName("track_info")
     */
    public $trackInfo;
}