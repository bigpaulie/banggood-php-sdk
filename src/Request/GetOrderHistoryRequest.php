<?php

namespace bigpaulie\banggood\Request;


use bigpaulie\banggood\Interfaces\RequestInterface;

/**
 * Class GetOrderHistoryRequest
 * @package bigpaulie\banggood\Request
 */
class GetOrderHistoryRequest implements RequestInterface
{
    /**
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * GetOrderHistoryRequest constructor.
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