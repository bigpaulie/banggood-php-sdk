<?php

namespace bigpaulie\banggood\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
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
     * @var string $lang
     *
     * @Type("string")
     */
    public $lang;
}