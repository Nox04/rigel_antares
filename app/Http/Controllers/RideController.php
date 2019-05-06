<?php
namespace App\Http\Controllers;

use App\Ride;
use App\Http\Requests\RideRequest;

class RideController extends BaseController
{
    /**
     * Create a controller instance.
     *
     */
    public function __construct(Ride $ride)
    {
        parent::__construct($ride);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param RideRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RideRequest $request)
    {
        return parent::storeBase($request);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param RideRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RideRequest $request, int $id)
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
    public function pendingRides()
    {
        return $this->entity->where('status', 'pending')->orWhere('status', 'active')->latest()->paginate(20);
    }
}