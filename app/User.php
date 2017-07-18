<?php

namespace App;

use Webpatser\Uuid\Uuid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    public $timestamps = [ "created_at" ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname', 'middlename', 'email', 'password', 'role', 'id', 'phone_no', 'lga_id', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function member(){
        return $this->hasOne('App\Member');
    }

    protected static function boot()
    {
        static::creating(function ($user) {
            $user->id = Uuid::generate();
            return $user;
        });
    }

}
