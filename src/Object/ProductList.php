<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class ProductList
 * @package bigpaulie\banggood\Object
 */
class ProductList
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
     * Identifier of product category.
     * @var string $catId
     *
     * @Type("string")
     * @SerializedName("cat_id")
     */
    public $catId;

    /**
     * Name of product.
     * @var string
     *
     * @Type("string")
     * @SerializedName("product_name")
     */
    public $productName;

    /**
     * Product main image url
     * @var string $img
     *
     * @Type("string")
     */
    public $img;

    /**
     * Product brief information
     * @var string $metaDesc
     *
     * @Type("string")
     * @SerializedName("meta_desc")
     */
    public $metaDesc;

    /**
     * The time of the product was published.
     * UTC TimeZone
     * @var string
     *
     * @Type("string")
     * @SerializedName("add_date")
     */
    public $addDate;

    /**
     * The last time a change has been made on the product information.
     * UTC TimeZone
     * @var string
     *
     * @Type("string")
     * @SerializedName("modify_date")
     */
    public $modifyDate;
}