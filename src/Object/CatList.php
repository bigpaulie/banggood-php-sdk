<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class CatList
 * @package bigpaulie\banggood\Object
 */
class CatList
{
    /**
     * @var string $catId
     *
     * @Type("string")
     * @SerializedName("cat_id")
     */
    public $catId;

    /**
     * @var string $catName
     *
     * @Type("string")
     * @SerializedName("cat_name")
     */
    public $catName;

    /**
     * @var string $parentId
     *
     * @Type("string")
     * @SerializedName("parent_id")
     */
    public $parentId;
}