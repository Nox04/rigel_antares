<?php

namespace App;

use App\Utils\DistanceCalculator;

class Ride extends Base
{

    /**
     * Messenger relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function messenger() {
        return $this->belongsTo(Messenger::class);
    }

    public static function boot() {
        parent::boot();
        self::created(function ($ride) {
            $messengers = new Messenger();
            $messengers = $messengers->getWorkingMessengers();
            $distances = [];
            foreach($messengers as $messenger) {
                $calculator = new DistanceCalculator($messenger->latitude, $messenger->longitude, 10.480639, -73.272768);
                $distance = $calculator->getDistanceInMetersTo();
                array_push($distances, ["distance" => $distance, "id" => $messenger->id]);
            }
            sort($distances);
            dd($distances);
        });

    }
}
