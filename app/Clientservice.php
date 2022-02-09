<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientservice extends Model
{

    protected $dates = ['created_at'];

    public function service(){
    return $this->belongsTo('App\Service');
}

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
