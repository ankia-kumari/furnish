<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
      'name',
      'message',
      'image',
      'status'
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
