<?php

namespace bigpaulie\banggood\Interfaces;

/**
 * Interface Arrayable
 * @package bigpaulie\banggood\Interfaces
 */
interface Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array;
}