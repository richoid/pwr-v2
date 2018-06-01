<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientPlace extends Pivot
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'place_id',
        'geo_relationship',
        ];
}
