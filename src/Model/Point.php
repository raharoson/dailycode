<?php

declare(strict_types=1);

namespace App\Model;

class Point
{
    public  function __construct(private float $x = 0, private float $y = 0) 
    {}

    /**
     * Get the value of x
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * Get the value of y
     */
    public function getY(): float
    {
        return $this->y;
    }

    public function equals(Point $point): bool
    {
        return ($this->x === $point->getX() && $this->y === $point->getY());
    }
}