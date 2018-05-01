<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $fillable = [
        'user_id', // user_id of creator
        'title',
        'body',
        'client_id',
        'place_id', // TODO: need places app
        'status',  // read, actionable, unread?
        'due_by',
        'priority',
        'taskable_id', // will cover assigned_to: group, user, activity 
        'taskable_type'
    ];
    
    public function taskable()
    {
        return $this->morphTo();
    }
}
