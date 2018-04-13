<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class OptionValues
 * @package bigpaulie\banggood\Object
 */
class OptionValues
{
    /**
     * Identifier of attributes value
     * @var string $poaId
     *
     * @Type("string")
     * @SerializedName("poa_id")
     */
    public $poaId;

    /**
     * Name of attributes value
     * @var string $poaName
     *
     * @Type("string")
     * @SerializedName("poa_name")
     */
    public $poaName;

    /**
     * Another identifier of Value(Gradually abandoned)
     * @var string $poa
     *
     * @Type("string")
     */
    public $poa;

    /**
     * The product attribute values corresponding to the price of the product(The unit is USD)
     * @var float $poaPrice
     *
     * @Type("float")
     * @SerializedName("poa_price")
     */
    public $poaPrice;

    /**
     * POA image url(50*50).
     * @var string $smallImage
     *
     * @Type("string")
     * @SerializedName("small_image")
     */
    public $smallImage;

    /**
     * POA image url(360*360).
     * @var string $viewImage
     *
     * @Type("string")
     * @SerializedName("view_image")
     */
    public $viewImage;

    /**
     * POA image url(600*600 or larger).
     * @var string $largeImage
     *
     * @Type("string")
     * @SerializedName("large_image")
     */
    public $largeImage;

    /**
     * POA image url(120*120).
     * @var string $listGridImage
     *
     * @Type("string")
     * @SerializedName("list_grid_image")
     */
    public $listGridImage;
}