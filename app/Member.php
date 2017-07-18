<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['member_id', 'level_id', 'parent_id', 'user_id'];
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function parent(){
        return $this->belongsTo('App\Member', 'parent_id');
    }

    public function children(){
        return $this->hasMany('App\Member', 'parent_id');
    }

    public function level(){
        return $this->belongsTo('App\Level');
    }

    public function compensations(){
        return $this->belongsToMany('\App\Level', 'member_compensations', 'member_id', 'level_id');
    }
}
