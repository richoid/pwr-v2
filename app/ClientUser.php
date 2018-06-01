<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientUser extends Pivot
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'client_short',
        'user_id',
        ];
}
