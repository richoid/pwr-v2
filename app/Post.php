<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Post extends Model
{
    use SoftDeletes;
    use HasRoles;
    
    protected $guard_name = 'web'; 
    
    protected $dates = ['start_date','end_date','deleted_at', 'publish_date', 'archive_date'];

	protected $fillable = [
        'user_id', // user who created the post
        'title',
        'body',
        'short',
        'start_date',
        'end_date',
        'publish_date',
        'archive_date',
        'alert_level',
        'place_id',
        'notify',
        'status',  // types are now in clientpost model news, alert, calendar, info
        ];
    
    
    public function clients()
    {
        return $this->belongsToMany('App\Client')->withPivot('user_id', 'post_type', 'client_short');
    }

    public function profiles() 
    {
		return $this->belongsTo('App\Profile', 'user_id');
    }

    public function users() 
    {
		return $this->belongsTo('App\Profile', 'user_id')->withPivot('client_short');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function clientsWhereClientShort($client)
    {
        return $this->belongsToMany('App\Client')->wherePivot('client_short', $client);

    }
    
}
