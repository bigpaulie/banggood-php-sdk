<?php

namespace bigpaulie\banggood\Interfaces;

/**
 * Interface RequestInterface
 * @package bigpaulie\banggood\Interfaces
 */
interface RequestInterface
{
    /**
     * @return array
     */
    public function getParameters(): array;
}