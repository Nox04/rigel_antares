<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Base extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['*'];
    protected static $ignoreChangedAttributes = ['created_at','updated_at', 'enabled', 'status'];
    protected static $logOnlyDirty = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * Return enabled elements.
     *
     * @param $query
     * @return array
     */
    public function scopeEnabled($query) {
        return $query->where('enabled', true);
    }
}
