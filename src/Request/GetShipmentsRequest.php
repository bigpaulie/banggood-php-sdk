<?php

namespace bigpaulie\banggood\Request;


use bigpaulie\banggood\Interfaces\RequestInterface;

/**
 * Class GetShipmentsRequest
 * GetShipments API is mainly used to obtain the shipping method provided by
 * Banggood and its costs which a product shipped to the location of the user.
 *
 * @package bigpaulie\banggood\Request
 */
class GetShipmentsRequest implements RequestInterface
{
    /**
     * @var array $parameters
     */
    private $parameters = [];

    /**
     * GetShipmentsRequest constructor.
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