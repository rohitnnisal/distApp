<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\DistanceCalculator;

class DistanceCalculatorTest extends TestCase
{
    public function testDistanceCalculation()
    {
        $dublinLatitude = 53.3340285;
        $dublinLongitude = -6.2535495;

        // Test with a known nearby location
        $nearbyLatitude = 53.339428;
        $nearbyLongitude = -6.257664;
        $distance = DistanceCalculator::calculate($dublinLatitude, $dublinLongitude, $nearbyLatitude, $nearbyLongitude);

        $this->assertLessThan(100, $distance);

        // Test with a known far location
        $farLatitude = 52.986375;
        $farLongitude = -6.043701;
        $distance = DistanceCalculator::calculate($dublinLatitude, $dublinLongitude, $farLatitude, $farLongitude);

        $this->assertGreaterThan(100, $distance);
    }
}
