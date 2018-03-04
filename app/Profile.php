<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    
    protected $dates = ['birth_date', 'deleted_at'];
    protected $fillable = ['user_id', 'email', 'given_name', 'family_name', 'phone_m', 'phone_h', 'phone_w', 'phone_prefs', 'street_address', 'address_locality', 'address_region', 'postal_code', 'avatar_url', 'birth_date'];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function reports() {
        return $this->belongsToMany('App\Reports');
    }
    
    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function social() {
        return $this->hasMany('App\Social', 'sociable_id');
    }
}
