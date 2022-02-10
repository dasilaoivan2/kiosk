<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactiontype extends Model
{
    public function servicetranstypes()
    {
        return $this->hasMany('App\Servicetransactiontype');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service', 'servicetransactiontypes', 'transactiontype_id', 'service_id');
    }
}
