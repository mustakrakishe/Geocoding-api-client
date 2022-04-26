<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public $fillable = [
        'latitude',
        'longitude',
        'pointable_type',
        'pointable_id',
    ];
    
    /**
     * @return StreetAddress|City|Region
     */
    public function pointable()
    {
        return $this->morphTo();
    }
}
