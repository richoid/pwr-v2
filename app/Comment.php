<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $fillable = [
        'user_id',
        'title',
        'body',
        'place_id', // TODO: need places app
        'status',  // read, actionable, unread?
        'commentable_id',
        'commentable_type' // Report, Task, Profile, ?
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

}
