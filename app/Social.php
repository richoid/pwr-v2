<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['sociable_type', 'sociable_id', 'url'];
    protected $table = 'social';
/*
    public function profile() 
    {
        return $this->belongsTo('App\Profile');
    }
*/
    public function profile()
    {
        return $this->morphMany('App\Profile', 'sociable');
    }
}
