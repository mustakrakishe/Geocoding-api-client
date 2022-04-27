<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public $fillable = [
        'latitude',
        'longitude',
        'address_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
