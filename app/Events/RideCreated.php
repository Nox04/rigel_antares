<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RideCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ride;
    public $messengers;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ride, $messengers)
    {
        $this->ride = $ride;
        $this->messengers = $messengers;
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'ride' => $this->ride,
            'messengers' => $this->messengers
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $headings = [];
        $headings['en'] = 'Nuevo domicilio';
        $tags = [];

        foreach($this->messengers as $messenger) {
            array_push($tags, ["field" => "phone", "relation" => "=", "value" => $messenger->phone]);
        }

        OneSignal::setParam('headings', $headings)
        ->sendNotificationUsingTags(
            "Barrio " . $this->ride->neighborhood,
            $tags,
            $url = null,
            $data = ["ride_id" => $this->ride->id],
            $buttons = [["id" => "1", "text" => "Aceptar", "icon" => ""], ["id" => "2", "text" => "Rechazar", "icon" => ""]],
            $schedule = null
        );

        return new PrivateChannel('new-rides');
    }
}
