<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreetAddress extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function points()
    {
        return $this->morphMany(Point::class, 'pointable');
    }
}