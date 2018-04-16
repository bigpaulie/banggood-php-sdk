<?php

namespace bigpaulie\banggood\Object;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class Countries
 * @package bigpaulie\banggood\Object
 */
class Countries
{
    /**
     * @var int $countryId
     *
     * @Type("integer")
     * @SerializedName("country_id")
     */
    public $countryId;

    /**
     * @var string $countryName
     *
     * @Type("string")
     * @SerializedName("country_name")
     */
    public $countryName;
}