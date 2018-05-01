<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $fillable = [
        'user_id', // user that created the activity
        'client_id',
        'title',
        'body',
        'start_date',
        'end_date',
        'place_id', // TODO: need places app
        'status',  // read, actionable, unread?
        'priority',
        'activable_id', // will cover assigned_to: group, user 
        'activable_type'
    ];

    public function activable()
    {
        return $this->morphTo();
    }

}
