<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //
    public function state(){
        return $this->belongsTo('App\State');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
