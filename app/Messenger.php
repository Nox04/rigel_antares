<?php

namespace App;

class Messenger extends Base
{

    /**
     * Rides relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rides() {
        return $this->hasMany(Ride::class);
    }

    /**
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
