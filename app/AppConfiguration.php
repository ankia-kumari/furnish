<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppConfiguration extends Model
{
    protected $fillable = [
      'title',
      'slug',
      'value'
    ];


}
