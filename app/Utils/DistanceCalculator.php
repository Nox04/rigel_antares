<?php

namespace App\Utils;

class DistanceCalculator {
    private $latitude;
    private $longitude;
    private $latitude2;
    private $longitude2;

    public function __construct($latitude, $longitude, $latitude2, $longitude2)
    {
        $this->latitude = deg2rad($latitude);
        $this->longitude = deg2rad($longitude);
        $this->latitude2 = deg2rad($latitude2);
        $this->longitude2 = deg2rad($longitude2);
    }

    public function getDistanceInMetersTo()
    {
        $radiusOfEarth = 6371000;// Earth's radius in meters.
        $diffLatitude = $this->latitude2 - $this->latitude;
        $diffLongitude = $this->longitude2 - $this->longitude;
        $a = sin($diffLatitude / 2) * sin($diffLatitude / 2) +
            cos($this->latitude) * cos($this->latitude2) *
            sin($diffLongitude / 2) * sin($diffLongitude / 2);
        $c = 2 * asin(sqrt($a));
        $distance = $radiusOfEarth * $c;
        return $distance;
    }
}
