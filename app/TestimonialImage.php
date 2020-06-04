<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimonialImage extends Model
{
    protected $fillable = [
      'image',
      'testimonial_id_fk'
    ];



}
