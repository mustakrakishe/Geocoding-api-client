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
        [$latitude, $longitute] = explode(', ', $request->input('latlng'));
        $point = Point::firstOrNew([
                'latitude' => $latitude,
                'longitude' => $longitute,
        ]);

        if (!$point->pointable) {
            $point->pointable()->save($this->createPointable($latitude, $longitute))
        }

        return json_encode([
            'latitude' => $request->input('lat'),
            'longitude' => $request->input('lng'),
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
