<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\Order\OrderHistory;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetOrderHistoryResponse
 * @package bigpaulie\banggood\Response
 */
class GetOrderHistoryResponse extends BaseResponse
{
    /**
     * @var OrderHistory[] $oderHistory
     *
     * @Type("array<bigpaulie\banggood\Object\Order\OrderHistory>")
     * @SerializedName("order_history")
     */
    public $oderHistory;

    /**
     * @var string $trackNumber
     *
     * @Type("string")
     * @SerializedName("track_number")
     */
    public $trackNumber;
}