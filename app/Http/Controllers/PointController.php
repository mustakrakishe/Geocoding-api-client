<?php

namespace App\Http\Controllers;

use App\Facades\Geocode;
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
            return $response = Geocode::getAddresses($latitude, $longitude);

            // $point->pointable()->save($this->createPointable($latitude, $longitute));
        }
    }
}
