<?php

namespace App;

use App\Events\RideCreated;
use App\Events\RideUpdated;
use App\Jobs\ResendRide;
use App\Utils\DistanceCalculator;
use OneSignal;

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

    /**
     * Neighborhood relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function neighborhood() {
        return $this->belongsTo(Neighborhood::class);
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

    public function sendRideToMessengers($ride) {
        $messengers = new Messenger();
        $messengers = $messengers->getWorkingMessengers();
        $distances = [];

        foreach($messengers as $messenger) {
            $calculator = new DistanceCalculator($messenger->latitude, $messenger->longitude, 10.480639, -73.272768);
            $distance = $calculator->getDistanceInMetersTo();
            array_push($distances, ["distance" => $distance, "id" => $messenger->id]);
        }

        sort($distances);

        $headings = [];
        $headings['en'] = 'Nuevo domicilio';
        $tags = [];
        $messengers = array_slice($distances, 0, 5);

        foreach($messengers as $messenger) {
            array_push($tags, [
                "field" => "tag",
                "key" => "phone",
                "relation" => "=",
                "value" => $messenger['phone']]);
        }

        OneSignal::setParam('headings', $headings)
        ->sendNotificationUsingTags(
            "Barrio " . $ride->neighborhood,
            $tags,
            $url = null,
            $data = ["ride_id" => $ride->id],
            $buttons = [["id" => "1", "text" => "Aceptar", "icon" => ""], ["id" => "2", "text" => "Rechazar", "icon" => ""]],
            $schedule = null
        );
    }

    public function reactivate() {
        $this->sendRideToMessengers($this);
        $this->status = 'pending';
        $this->save();

        ResendRide::dispatch($this)->delay(now()->addSeconds(20));
    }
}
