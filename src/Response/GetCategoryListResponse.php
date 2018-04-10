<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\CatList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetCategoryListResponse
 * @package bigpaulie\banggood\Response
 */
class GetCategoryListResponse extends BaseResponse
{
    /**
     * @var int $catTotal
     *
     * @Type("int")
     * @SerializedName("cat_total")
     */
    public $catTotal;

    /**
     * @var CatList[]
     *
     * @Type("array<bigpaulie\banggood\Object\CatList>")
     * @SerializedName("cat_list")
     */
    public $catList;
}