<?php

namespace App;

class Neighborhood extends Base
{
    /**
     * Rides relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rides() {
        return $this->hasMany(Ride::class);
    }
}
