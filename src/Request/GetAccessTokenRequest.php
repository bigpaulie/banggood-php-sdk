<?php

namespace bigpaulie\banggood\Request;

use bigpaulie\banggood\Interfaces\RequestInterface;

/**
 * Class GetAccessTokenRequest
 * @package bigpaulie\banggood\Request
 */
class GetAccessTokenRequest implements RequestInterface
{
    /**
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * GetAccessTokenRequest constructor.
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