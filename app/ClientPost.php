<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;


class ClientPost extends Pivot
{
    use SoftDeletes;

    protected $fillable = [
        'client_short',
        'client_id',
        'user_id',
        'post_id',
        'post_type',
        ];
}
