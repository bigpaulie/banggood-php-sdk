<?php

namespace bigpaulie\banggood\Response;

use JMS\Serializer\Annotation\Type;
use bigpaulie\banggood\Interfaces\ResponseInterface;

/**
 * Class BaseResponse
 * @package bigpaulie\banggood\Response
 */
abstract class BaseResponse implements ResponseInterface
{
    /**
     * @var int $code
     *
     * @Type("int")
     */
    public $code;

    /**
     * @var string $msg
     *
     * @Type("string")
     */
    public $msg;
}