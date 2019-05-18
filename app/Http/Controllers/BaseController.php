<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class BaseController extends Controller
{
    protected $entity;

    /**
     * Create a controller instance.
     *
     * @param $entity
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->entity->format($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return response()->json($this->entity->find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest $request
     * @return Response
     */
    protected function storeBase(FormRequest $request)
    {
        return response()->json($this->entity->create($request->all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FormRequest $request
     * @param  int $id
     * @return Response
     */
    protected function updateBase(FormRequest $request, int $id)
    {
        $entity = $this->entity->find($id)->fill($request->all());
        $entity->save();
        return response()->json($entity);
    }

    /**
     * Change status the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function status(Request $request)
    {
        $entity = $this->entity->find($request->id);
        $entity->enabled = $request->status;
        $entity->save();
        activity()
            ->causedBy(Auth::id())
            ->performedOn($entity)
            ->log($entity->enabled ? 'enabled' : 'disabled');
        return response()->json($request->all());
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return response()->json($this->entity->find($id)->checkAndDelete());
    }

    /**
     * Process data tables ajax request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function data(Request $request)
    {
        $filters = $request->filter;
        $model = $filters === null ? $this->model : $this->table->filters($this->model, $filters);
        if (isset($request->action) and $request->action === 'hours') return $model;
        else if (isset($request->action)) {
            $headers = [];
            $fields = $this->table->fieldsExport;
            foreach ($fields as $key => $value) {
                $header = is_array($value) ?
                    array_key_exists(3, $value) ? $value[3]
                        : ($value[1] === 'select' ? $value[0] : $value[0] . '_id')
                    : $value;
                $headers[$key] = __('validation.attributes.' . $header);
            }
            return response()->json(Excel::export($model, $headers, $fields, $request->action, $this->crud));
        }
        return (new EloquentDataTable($model))->toJson();
    }
}
