<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DistanceCalculator;

class AffiliateController extends Controller
{
    public function index()
    {
        $dublinLatitude = 53.3340285;
        $dublinLongitude = -6.2535495;
        $maxDistance = 100;

        // Read the affiliates.txt file
        $filePath = public_path('affiliates.txt');
        $fileHandle = fopen($filePath, 'r');

        if ($fileHandle === false) {
            return response()->json(['error' => 'Unable to read affiliates.txt'], 500);
        }

        $affiliates = [];
        while (($line = fgets($fileHandle)) !== false) {
            $affiliate = json_decode($line, true);
            if ($affiliate) {
                $affiliates[] = $affiliate;
            }
        }

        fclose($fileHandle);

        $nearbyAffiliates = [];
        foreach ($affiliates as $affiliate) {
            $distance = DistanceCalculator::calculate(
                $dublinLatitude,
                $dublinLongitude,
                $affiliate['latitude'],
                $affiliate['longitude']
            );
            if ($distance <= $maxDistance) {
                $nearbyAffiliates[] = $affiliate;
            }
        }

        // Sort by affiliate_id
        usort($nearbyAffiliates, function ($a, $b) {
            return $a['affiliate_id'] <=> $b['affiliate_id'];
        });

        return view('affiliates', ['affiliates' => $nearbyAffiliates]);
    }
}
