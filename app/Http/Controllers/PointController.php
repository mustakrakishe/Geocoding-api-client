<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $point = Point::firstOrNew([
                'latitude' => $latitude,
                'longitude' => $longitude,
        ]);

        if (!$point->pointable) {
            $api = new \App\Services\GeocodeApi(env('GEOCODE_TOKEN'), env('GEOCODE_LANG'));
            return $api->getAddresses($latitude, $longitude);

            // $point->pointable()->save($this->createPointable($latitude, $longitute));
        }
    }
}
