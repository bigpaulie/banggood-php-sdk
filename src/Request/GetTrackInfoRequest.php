<?php

namespace bigpaulie\banggood\Request;


use bigpaulie\banggood\Interfaces\RequestInterface;

/**
 * Class GetTrackInfoRequest
 * @package bigpaulie\banggood\Request
 */
class GetTrackInfoRequest implements RequestInterface
{
    /**
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * GetTrackInfoRequest constructor.
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