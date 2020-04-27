<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
      'title',
      'description',
      'icon',
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
        0 => 'Dark'
    ];

    public static $theme_value = [
        'Light' => 1,
        'Dark' => 0
    ];
}
