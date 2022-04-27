<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $fillable = [
        'place_id',
        'full',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
