<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\Order\SaleRecordIdList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetOrderInfoResponse
 * @package bigpaulie\banggood\Response
 */
class GetOrderInfoResponse extends BaseResponse
{
    /**
     * @var SaleRecordIdList $saleRecordIdList
     *
     * @Type("array<bigpaulie\banggood\Object\Order\SaleRecordIdList>")
     * @SerializedName("sale_record_id_list")
     */
    public $saleRecordIdList;
}