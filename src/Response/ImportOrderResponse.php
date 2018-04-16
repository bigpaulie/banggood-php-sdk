<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\Order\FailureList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class ImportOrderResponse
 * @package bigpaulie\banggood\Response
 */
class ImportOrderResponse extends BaseResponse
{
    /**
     * Unqiue identifier of order in your shop
     * @var string $saleRecordId
     *
     * @Type("string")
     * @SerializedName("sale_record_id")
     */
    public $saleRecordId;

    /**
     * The total number of products we have received
     * @var int $productTotal
     *
     * @Type("integer")
     * @SerializedName("product_total")
     */
    public $productTotal;

    /**
     * The total number of products we have received is successful.
     * @var int $successTotal
     *
     * @Type("integer")
     * @SerializedName("success_total")
     */
    public $successTotal;

    /**
     * The total number of products we have received is failure.
     * @var int $failureTotal
     *
     * @Type("integer")
     * @SerializedName("failure_total")
     */
    public $failureTotal;

    /**
     * The failure product detail
     * @var FailureList[] $failureList
     *
     * @Type("array<bigpaulie\banggood\Object\Order\FailureList>")
     * @SerializedName("failure_list")
     */
    public $failureList;
}