<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Place extends Model
{
    use SoftDeletes;

    protected $dates = ['start','end','deleted_at'];

	protected $fillable = [
        'name',
        'description',
        'lat',
        'long',
        'boundary',
        'path',
        'zoom_level',
        'bound_kml_url',
        'time_zone',
        ];

        
}