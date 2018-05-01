<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientPost extends Pivot
{
    protected $fillable = [
        'client_id',
        'post_id',
        ];
}
