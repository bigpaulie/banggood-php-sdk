<?php

namespace bigpaulie\banggood\Request;

use bigpaulie\banggood\Interfaces\RequestInterface;

/**
 * Class GetProductInfoRequest
 * @package bigpaulie\banggood\Request
 */
class GetProductInfoRequest implements RequestInterface
{
    /**
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * GetProductInfoRequest constructor.
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