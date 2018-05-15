<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientPost extends Pivot
{
    protected $fillable = [
        'client_short',
        'client_id',
        'user_id',
        'post_id',
        'post_type',
        ];
}
