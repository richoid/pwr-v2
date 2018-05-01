<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $fillable = [
        'user_id',
        'title',
        'body',
        'commentable_id',
        'place_id', // TODO: need places app
        'status',  // read, actionable, unread?
        'commentable_id',
        'commentable_type'
    ];
    
    public function commentable()
    {
        return $this->morphTo();
    }

}
