<?php

namespace App;

use App\Events\RideCreated;
use App\Events\RideUpdated;
use App\Jobs\ResendRide;
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
            $ride->reactivate();
        });

        self::updated(function($ride) {
            event(new RideUpdated($ride));
        });

    }

    public function sendRideToMessengers() {
        $messengers = new Messenger();
        $messengers = $messengers->getWorkingMessengers();
        $distances = [];

        foreach($messengers as $messenger) {
            $calculator = new DistanceCalculator($messenger->latitude, $messenger->longitude, 10.480639, -73.272768);
            $distance = $calculator->getDistanceInMetersTo();
            array_push($distances, ["distance" => $distance, "id" => $messenger->id]);
        }

        sort($distances);

        event(new RideCreated($this, array_slice($distances, 0, 5)));
    }

    public function reactivate() {
        $this->sendRideToMessengers();
        $this->status = 'pending';
        $this->save();

        ResendRide::dispatch($this)->delay(now()->addSeconds(20));
    }
}
