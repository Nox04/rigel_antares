<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Events\MessengerUpdated;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Messenger extends Authenticatable implements JWTSubject
{

    use LogsActivity;
    use Notifiable;

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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pin', 'updated_at'
    ];

    protected $guard = 'mobile';

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

    /**
     * Return filtered data
     *
     * @param Request
     * @return array
     */
    public function format(Request $request) {
        $order = explode("|", $request->sort);
        $filters = json_decode($request->filters, true);
        $model = $this->query();

        foreach($filters as $key => $filter) {
            if($filter != '') {
                $model = $model->where($key, 'like', '%'.$filter.'%');
            }
        }

        return $model->orderBy($order[0], $order[1])->paginate($request->per_page);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Return enabled elements.
     *
     * @param $query
     * @return array
     */
    public function scopeEnabled($query) {
        return $query->where('enabled', true);
    }

    public function updateGeo(Request $request) {
        $this->latitude = $request->latitude;
        $this->longitude = $request->longitude;
        $this->save();

        event(new MessengerUpdated($this));
    }
}
