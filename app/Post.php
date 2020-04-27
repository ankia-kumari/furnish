<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
     'title',
     'description',
     'image',
     'status',
     'user_id_fk',
     'views'

   ];

    public static $status_name = [
        1 => 'Active',
        0 => 'DeActive'
    ];

    public static $status_value = [
        'Active' => 1,
        'DeActive' => 0
    ];

    public function commentRelation(){

          return $this->hasMany(Comment::class,'post_id_fk','id');
    }

    public function userRelation() {
        return $this->belongsTo(User::class, 'user_id_fk','id');
    }


}
