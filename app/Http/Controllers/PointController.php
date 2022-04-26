<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        // $point = Point::firstOrNew([
        //         'latitude' => $latitude,
        //         'longitude' => $longitute,
        // ]);

        // if (!$point->pointable) {
        //     $point->pointable()->save($this->createPointable($latitude, $longitute));
        // }

        return Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'latlng' => '49.126464,33.431644',
            'key' => 'AIzaSyDFCFhb1JgbGK5dbwdAcJbYE4rpnbDDRDI',
            'language' => 'en'
        ]);
    }
}
