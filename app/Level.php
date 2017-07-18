<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamps = false;
    public function members(){
        return $this->hasMany('App\Member');
    }
}
