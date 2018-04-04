<?php

namespace bigpaulie\banggood\Response;

use JMS\Serializer\Annotation\Type;

/**
 * Class BaseResponse
 * @package bigpaulie\banggood\Response
 */
abstract class BaseResponse
{
    /**
     * @var int $code
     *
     * @Type("int")
     */
    public $code;
}