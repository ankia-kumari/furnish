<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   protected $fillable = [
     'title',
     'description',
     'link',
     'status',
     'image'

   ];

    public static $status_name = [
        1 => 'Active',
        0 => 'DeActive'
    ];

    public static $status_value = [
        'Active' => 1,
        'DeActive' => 0
    ];
}
