<?php

namespace bigpaulie\banggood\Response;

use bigpaulie\banggood\Object\Stocks;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class GetStocksResponse
 * @package bigpaulie\banggood\Response
 */
class GetStocksResponse extends BaseResponse
{
    /**
     * @var Stocks[] $stocks
     *
     * @Type("array<bigpaulie\banggood\Object\Stocks>")
     */
    public $stocks;
}