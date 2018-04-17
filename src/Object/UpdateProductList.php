<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class UpdateProductList
 * @package bigpaulie\banggood\Object
 */
class UpdateProductList
{
    /**
     * Identifier of product
     * @var string $productId
     *
     * @Type("string")
     * @SerializedName("product_id")
     */
    public $productId;

    /**
     * “1” indicates normal sales status ,”2” indicates halt sales status
     * @var int $state
     *
     * @Type("integer")
     */
    public $state;

    /**
     * The last time a change has been made on the product information.
     * UTC TimeZone
     * @var string $modifyDate
     *
     * @Type("string")
     * @SerializedName("modify_date")
     */
    public $modifyDate;
}