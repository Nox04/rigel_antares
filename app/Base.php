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
     * Return enabled elements.
     *
     * @param $query
     * @return array
     */
    public function scopeEnabled($query) {
        return $query->where('enabled', true);
    }

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
}
