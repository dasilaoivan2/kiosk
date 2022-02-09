<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $dates = ['created_at'];

    public function barangay(){
        return $this->belongsTo('App\Barangay');
    }

//    public function service(){
//        return $this->belongsTo('App\Service');
//    }

    public function clientservices(){
        return $this->hasMany('App\Clientservice');
    }
    public function clientservice(){
        return $this->hasOne('App\Clientservice');
    }


}
