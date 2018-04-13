<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class PoaList
{
    /**
     * Identifier of product attribute
     * @var string $optionId
     *
     * @Type("string")
     * @SerializedName("option_id")
     */
    public $optionId;

    /**
     * Product attribute name
     * @var string $optionName
     *
     * @Type("string")
     * @SerializedName("option_name")
     */
    public $optionName;

    /**
     * Value of product attributes
     * @var OptionValues[] $optionValues
     *
     * @Type("array<bigpaulie\banggood\Object\OptionValues>")
     * @SerializedName("option_values")
     */
    public $optionValues;
}