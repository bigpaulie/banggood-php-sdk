<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\ProductList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class GetProductListResponse extends BaseResponse
{
    /**
     * Total record number for product brief information
     * @var int
     *
     * @Type("int")
     * @SerializedName("product_total")
     */
    public $productTotal;

    /**
     * Product brief information
     * @var ProductList[]
     *
     * @Type("array<bigpaulie\banggood\Object\ProductList>")
     * @SerializedName("product_list")
     */
    public $productList;
}