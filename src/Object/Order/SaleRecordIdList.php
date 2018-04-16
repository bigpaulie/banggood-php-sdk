<?php

namespace bigpaulie\banggood\Object\Order;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class SaleRecordIdList
 * @package bigpaulie\banggood\Object\Order
 */
class SaleRecordIdList
{
    /**
     * @var string $saleRecordId
     *
     * @Type("string")
     * @SerializedName("sale_record_id")
     */
    public $saleRecordId;

    /**
     * @var OrderList[] $orderList
     *
     * @Type("array<bigpaulie\banggood\Object\Order\OrderList>")
     * @SerializedName("order_list")
     */
    public $orderList;

    /**
     * @var UserInfo[] $userInfo
     *
     * @Type("array<bigpaulie\banggood\Object\Order\UserInfo>")
     * @SerializedName("user_info")
     */
    public $userInfo;
}