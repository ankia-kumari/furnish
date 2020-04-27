<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
      'name',
      'designation',
        'image',
      'facebook_url',
      'twitter_url',
      'linkedin_url',
      'feed_url',
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
