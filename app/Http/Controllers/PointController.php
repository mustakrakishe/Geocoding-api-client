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
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $point = Point::firstOrNew([
                'latitude' => $latitude,
                'longitude' => $longitude,
        ]);

        if (!$point->pointable) {
            return $response = Geocode::getAddresses($latitude, $longitude);

            // $point->pointable()->save($this->createPointable($latitude, $longitute));
        }
    }
}
