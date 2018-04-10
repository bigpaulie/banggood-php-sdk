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
     * @var int $page
     *
     * @Type("int")
     */
    public $page;

    /**
     * @var int $pageTotal
     *
     * @Type("int")
     * @SerializedName("page_total")
     */
    public $pageTotal;

    /**
     * @var int
     *
     * @Type("int")
     * @SerializedName("page_size")
     */
    public $pageSize;

    /**
     * @var int $catTotal
     *
     * @Type("int")
     * @SerializedName("cat_total")
     */
    public $catTotal;

    /**
     * @var string $lang
     *
     * @Type("string")
     */
    public $lang;

    /**
     * @var CatList[]
     *
     * @Type("array<bigpaulie\banggood\Object\CatList>")
     * @SerializedName("cat_list")
     */
    public $catList;
}