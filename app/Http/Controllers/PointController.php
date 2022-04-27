<?php

namespace App\Http\Controllers;

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
        
        // $point = Point::firstOrNew([
        //         'latitude' => $latitude,
        //         'longitude' => $longitute,
        // ]);

        // if (!$point->pointable) {
        //     $point->pointable()->save($this->createPointable($latitude, $longitute));
        // }

        return json_encode([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    /**
     * @return App\Models\StreetAddress|App\Models\City|App\Models\Region
     */
    private function createPointable(float $latitude, float $longitute)
    {
        // 
    }
}
