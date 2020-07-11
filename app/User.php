<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Message;
use Illuminate\Support\Facades\Cache;
use Kodeine\Acl\Traits\HasRole;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sentMessage(){

        return $this->hasMany(Message::class,'from_user_id_fk','id')->where('to_user_id_fk',8);
    }

    public function receiveMessage(){

        return $this->hasMany(Message::class,'to_user_id_fk','id')->where('from_user_id_fk',8);
    }

    public function messages() {
       return $this->sentMessage()->combine($this->receiveMessage());
    }

    public function userIsOnline(){

        return Cache::has('user-is-online-'. $this->id);
    }
}
