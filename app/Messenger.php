<?php

namespace App;

class Messenger extends Base
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pin'
    ];

    /**
     * Rides relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rides() {
        return $this->hasMany(Ride::class);
    }

    public function getWorkingMessengers() {
        return $this->where('working', 1)->get();
    }
}
