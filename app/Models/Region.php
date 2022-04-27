<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $fillable = [
        'place_id',
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
