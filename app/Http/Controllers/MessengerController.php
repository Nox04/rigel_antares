<?php

namespace App\Http\Controllers;

use App\Messenger;
use App\Http\Requests\MessengerRequest;
use Illuminate\Http\Request;

class MessengerController extends BaseController
{
    /**
     * Create a controller instance.
     */
    public function __construct(Messenger $messenger)
    {
        parent::__construct($messenger);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param MessengerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessengerRequest $request)
    {
        return parent::storeBase($request);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param MessengerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MessengerRequest $request, int $id)
    {
        return parent::updateBase($request, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessengerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function workingMessengers()
    {
        return $this->entity->getWorkingMessengers();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessengerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function workingAndBusyMessengers()
    {
        return $this->entity->getWorkingAndBusyMessengers();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param MessengerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateGeo(Request $request)
    {
        return $this->entity->find($request->id)->updateGeo($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessengerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function startJourny(Request $request)
    {
        return $this->entity->find($request->id)->startJourny();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessengerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function stopJourny(Request $request)
    {
        return $this->entity->find($request->id)->stopJourny();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessengerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getMyRides(Request $request)
    {
        return $this->entity->find($request->id)->rides()->latest()->get();
    }
}
