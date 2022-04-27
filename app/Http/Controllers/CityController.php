<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityCollection;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        return new CityCollection(City::with('region')->get());
    }
}
