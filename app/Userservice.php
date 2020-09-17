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
        return $this->hasMany('App\Clientservice','service_id','service_id');
    }

}
