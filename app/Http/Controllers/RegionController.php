<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegionCollection;
use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return new RegionCollection(Region::with('cities')->get());
    }
}
