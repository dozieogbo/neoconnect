<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{
    protected $table = 'compensations';
    protected $fillable = ['member_id', 'level_id', 'has_received'];
    public function level(){
        return $this->hasOne('\App\Level', 'id');
    }

    public function member(){
        return $this->hasOne('\App\Member', 'user_id');
    }
}
