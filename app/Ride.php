<?php

namespace App;

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
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
