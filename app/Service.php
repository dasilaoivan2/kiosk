<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function userservices(){
        return $this->hasMany('App\Userservice');
    }

    public function clientservices(){
        return $this->hasMany('App\Clientservice');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function office(){
        return $this->belongsTo('App\Office');
    }

}
