<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicetransactiontype extends Model
{
    //

    public function service(){
        return $this->belongsTo('App\Service');
    }


    public function transactiontype(){
        return $this->belongsTo('App\Transactiontype');
    }
}
