<?php

declare(strict_types = 1);

namespace App\Easy;

use App\Model\Point;

/**
 * This problem was asked by Google.
 * Given a set of points (x, y) on a 2D cartesian plane, 
 * find the two closest points. 
 * For example, given the points [(1, 1), (-1, -1), (3, 4), (6, 1), (-1, -6), (-4, -3)], return [(-1, -1), (1, 1)]
 */
class ClosestPoint
{
    public function closest(array $points): array
    {
        $coupleOfPoint = $this->getCoupleOfPoints($points);
        usort(
            $coupleOfPoint, 
            fn($a, $b) => $this->distance(...$b) <=> $this->distance(...$a)
        );
        return array_pop($coupleOfPoint);
    }

    private function getCoupleOfPoints(array $points): array
    {
        $size = count($points);
        for ($i = 0; $i < $size; $i++) {
            for ($j = $i + 1; $j < $size - $i - 1; $j++) {
                $coupleOfPoints[] = [$points[$i], $points[$j]];
            } 
        }
        return $coupleOfPoints ?? [];
    }

    private function distance(Point $a, Point $b): float
    {
        return pow(pow($b->getX() - $a->getX(), 2) + pow($b->getY() - $a->getY(), 2), 0.5);
    }
}