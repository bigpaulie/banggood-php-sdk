<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class ImageList
 * @package bigpaulie\banggood\Object
 */
class ImageList
{
    /**
     * product image url(85*85).
     * @var string $home
     *
     * @Type("string")
     */
    public $home;

    /**
     * product image url(120*120).
     * @var string $listGrid
     *
     * @Type("string")
     * @SerializedName("list_grid")
     */
    public $listGrid;

    /**
     * product image url(163*163).
     * @var string $grid
     *
     * @Type("string")
     */
    public $grid;

    /**
     * product image url(235*235).
     * @var string $gallery
     *
     * @Type("string")
     */
    public $gallery;

    /**
     * product image url(361*361).
     * @var string $view
     *
     * @Type("string")
     */
    public $view;

    /**
     * product image url(50*50).
     * @var string $otherItems
     *
     * @Type("string")
     * @SerializedName("other_items")
     */
    public $otherItems;

    /**
     * product image url(600*600 or larger).
     * @var string $large
     *
     * @Type("string")
     */
    public $large;
}