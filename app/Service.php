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

    public function classification(){
        return $this->belongsTo('App\Classification');
    }

    public function servicetranstypes(){
        return $this->hasMany('App\Servicetransactiontype');
    }

    public function transactiontypes()
    {
        return $this->belongsToMany('App\Transactiontype', 'servicetransactiontypes', 'service_id', 'transactiontype_id');
    }

    public function availability(){
        return $this->belongsTo('App\Availability');
    }

    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }

    public function steps()
    {
        return $this->hasMany('App\Step');
    }

    public function fileattachments()
    {
        return $this->hasMany('App\Fileattachment');
    }

//    public function totalminutes(){
//        return $this->steps->sum('processing_time');
//    }
//
//    public function totalfees(){
//        $total = 0;
//        foreach ($this->steps as $step){
//            $total += $step->agencyactions->sum('amount');
//
//        }
//        return $total;
//
//    }

}
