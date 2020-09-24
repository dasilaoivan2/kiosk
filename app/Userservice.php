<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userservice extends Model
{
    public function service(){
        return $this->belongsTo('App\Service');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function clients(){
        $now = date('Y-m-d');
        return $this->hasMany('App\Clientservice','service_id','service_id')->whereDate('clientservices.created_at', '=', $now);
    }

    public function clientsServed(){
        return $this->hasMany('App\Clientservice','service_id','service_id');
    }

    public function clientsPending(){
        return $this->hasMany('App\Clientservice','service_id','service_id');
    }

    public function clientsServedToday(){
        $now = date('Y-m-d');
        return $this->hasMany('App\Clientservice','service_id','service_id')->whereDate('clientservices.created_at', '=', $now);
    }

}
