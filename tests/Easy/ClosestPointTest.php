<?php

declare(strict_types=1);

namespace Test\Easy;

use App\Model\Point;
use App\Easy\ClosestPoint;
use App\Traits\ArrayFunctions;
use PHPUnit\Framework\TestCase;

class ClosestPointTest extends TestCase
{
    use ArrayFunctions;

    public function setUp(): void
    {
        $this->closestPoint = new ClosestPoint();
    }
    public function testClosest()
    {
        $points = $this->closestPoint->closest([
            new Point(1, 1), 
            new Point(-1, -1), 
            new Point(3, 4), 
            new Point(6, 1), 
            new Point(-1, -6), 
            new Point(-4, -3)
        ]);

        $this->assertObjectEquals($points[0], new Point(1, 1));
        $this->assertObjectEquals($points[1], new Point(-1, -1));
    }
}