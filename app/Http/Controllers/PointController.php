<?php

namespace App\Http\Controllers;

use App\Facades\Geocode;
use App\Models\Point;
use App\Http\Requests\PointStoreRequest;
use App\Http\Resources\PointCollection;
use App\Http\Resources\PointResource;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PointCollection(Point::with('address.city.region')->get());
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

            $point = $address->points()->create($point->toArray());
        }

        return (new PointResource($point->load('address.city.region')))->additional(['status' => 'OK']);
    }

    public function getByCity(int $cityId)
    {
        return new PointCollection(Point::with('address.city.region')->whereRelation('address.city', 'id', $cityId)->get());
    }

    public function getByRegion(int $regionId)
    {
        return new PointCollection(Point::with('address.city.region')->whereRelation('address.city.region', 'id', $regionId)->get());
    }
}
