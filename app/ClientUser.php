<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientUser extends Pivot
{
    protected $fillable = [
        'client_id',
        'client_short',
        'user_id',
        ];
}
