<?php

namespace bigpaulie\banggood\Response;


use bigpaulie\banggood\Object\UpdateProductList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetProductUpdateListResponse
 * @package bigpaulie\banggood\Response
 */
class GetProductUpdateListResponse extends BaseResponse
{
    /**
     * Total record number for product brief information
     * @var int $productTotal
     *
     * @Type("integer")
     * @SerializedName("product_total")
     */
    public $productTotal;

    /**
     * Update product brief information
     * @var UpdateProductList[] $updateProductList
     *
     * @Type("array<bigpaulie\banggood\Object\UpdateProductList>")
     * @SerializedName("product_list")
     */
    public $productList;
}