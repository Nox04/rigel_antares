<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at'
    ];

    /**
     * Return enabled elements.
     *
     * @param $query
     * @return array
     */
    public function scopeEnabled($query) {
        return $query->where('enabled', true);
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
        $relations = json_decode($request->relations, true);
        $model = $this->query();

        foreach($filters as $key => $filter) {
            if($filter != '') {
                $model = $model->where($key, 'like', '%'.$filter.'%');
            }
        }

        foreach($relations as $key => $relation) {
            if($relation != '') {
                $model = $model->with($key);
            }
        }

        return $model->orderBy($order[0], $order[1])->paginate($request->per_page);
    }
}
