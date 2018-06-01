<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PlacePlace extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'place_id',
        'place_id_related',
        'geo_relationship',
    ];
}
