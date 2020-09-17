<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use DB;

class Office extends Model
{
    public function services(){
        return $this->hasMany('App\Service');
    }

    public function clientservices(){

        return $this->hasManyThrough('App\Clientservice','App\Service');

    }

}
