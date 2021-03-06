<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message',
        'to_user_id_fk',
        'from_user_id_fk'

      ];

     public function messageReceivedToAuthUser(){

       return $this->belongsTo(User::class, 'from_user_id_fk', 'id');
     }

}
