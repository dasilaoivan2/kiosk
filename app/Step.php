<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    public function service(){
        return $this->belongsTo('App\Service');
    }

    public function agencyactions()
    {
        return $this->hasMany('App\Agencyaction');
    }


}
