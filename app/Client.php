<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Client extends Model
{
    use SoftDeletes;

    protected $dates = ['license_start_date', 'license_expire_date', 'deleted_at'];
    
    protected $fillable = [
        'client_short', 
        'client_name', 
        'parent_org', 
        'client_contact_id',
        'license_start_date',
        'license_expire_date',
        'client_status',
        'client_phone',
        'street_address',
        'address_locality',
        'county',
        'address_region',
        'postal_code',
        'area_served',
        'time_zone',
        'lat',
        'long',
        'map_zoom_level',
        'bound_kml_url',
        'require_reg',
        'brand1',
        'brand2',
        'brand1_size',
        'brand2_size',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post')->withPivot('user_id', 'post_type', 'client_short');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('client_short');
    }


    public function sociable() {
        return $this->morphTo();
    }
}
