<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\ImageList;
use bigpaulie\banggood\Object\PoaList;
use bigpaulie\banggood\Object\WarehouseList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetProductInfoResponse
 * @package bigpaulie\banggood\Response
 */
class GetProductInfoResponse extends BaseResponse
{
    /**
     * Poa information of product
     * @var PoaList[] $poaList
     *
     * @Type("array<bigpaulie\banggood\Object\PoaList>")
     * @SerializedName("poa_list")
     */
    public $poaList;

    /**
     * Warehouse information of product
     * @var WarehouseList[] $warehouseList
     *
     * @Type("array<bigpaulie\banggood\Object\WarehouseList>")
     * @SerializedName("warehouse_list")
     */
    public $warehouseList;

    /**
     * image of product
     * @var ImageList[] $imageList
     *
     * @Type("array<bigpaulie\banggood\Object\ImageList>")
     * @SerializedName("image_list")
     */
    public $imageList;

    /**
     * Full item description.(include html tags)
     * @var string $description
     *
     * @Type("string")
     */
    public $description;

    /**
     * The weight of product(the unit is Kilogram)
     * @var string $weight
     *
     * @Type("string")
     */
    public $weight;

    /**
     * Name of product
     * @var string $productName
     *
     * @Type("string")
     * @SerializedName("product_name")
     */
    public $productName;
}