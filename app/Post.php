<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['start','end','deleted_at'];

	protected $fillable = [
        'user_id',
        'title',
        'body',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'alert_level',
        'place_id',
        'notify'
        ];
    
    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function users() 
    {
		return $this->belongsTo('App\Profile');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
}
