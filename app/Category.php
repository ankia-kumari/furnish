<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'title',
      'description',
      'image',
      'status',
      'theme'
    ];

    public static $status_name = [
       1 => 'Active',
       0 => 'DeActive'
    ];

    public static $status_value = [
       'Active' => 1,
       'DeActive' => 0
    ];

    public static $theme_name = [
        1 => 'Light',
        0 => 'Blue'
    ];

    public static $theme_value = [
       'Light' => 1,
       'Blue' => 0
    ];
}
