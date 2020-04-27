<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'post_id_fk',
        'user_id_fk'

    ];
   public function userRelation(){
       return $this->belongsTo(User::class,'user_id_fk','id');
   }
}
