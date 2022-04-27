<?php

namespace App\Http\Controllers;

use App\Facades\Geocode;
use App\Models\Point;
use App\Http\Requests\PointStoreRequest;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PointStoreRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointStoreRequest $request)
    {
        $point = Point::firstOrNew([
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        if (!$point->address) {
            $geocodeAddresses = Geocode::getAddresses($point->latitude, $point->longitude);

            $address = \App\Services\GeocodeAddressMaker::make($geocodeAddresses);

            $point = $address->points()->create($point->toArray())->load('address');
        }

        return $point;
    }
}
