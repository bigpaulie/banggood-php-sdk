<?php

namespace bigpaulie\banggood\Request;


use bigpaulie\banggood\Interfaces\RequestInterface;

/**
 * Class GetStocksRequest
 * @package bigpaulie\banggood\Request
 */
class GetStocksRequest implements RequestInterface
{
    /**
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * GetStocksRequest constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}