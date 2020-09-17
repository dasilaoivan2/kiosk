<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    public function clients(){
        return $this->hasMany('App\Client');
    }
}
