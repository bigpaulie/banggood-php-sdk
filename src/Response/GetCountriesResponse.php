<?php

namespace bigpaulie\banggood\Response;


use bigpaulie\banggood\Object\Countries;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetCountriesResponse
 * @package bigpaulie\banggood\Response
 */
class GetCountriesResponse extends BaseResponse
{
    /**
     * @var Countries[] $countries
     *
     * @Type("array<bigpaulie\banggood\Object\Countries>")
     */
    public $countries;
}