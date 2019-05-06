<?php

namespace App\Jobs;

use App\Ride;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ResendRide implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ride;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Ride $ride)
    {
        $this->ride = $ride;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->ride->messenger_id == null) {
            $this->ride->status = 'inactive';
            $this->ride->save();
        }
    }
}
