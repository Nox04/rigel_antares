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
}
