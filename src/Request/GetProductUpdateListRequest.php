<?php

namespace bigpaulie\banggood\Request;


use bigpaulie\banggood\Interfaces\RequestInterface;

/**
 * Class GetProductUpdateListRequest
 * @package bigpaulie\banggood\Request
 */
class GetProductUpdateListRequest implements RequestInterface
{
    /**
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * GetProductUpdateListRequest constructor.
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