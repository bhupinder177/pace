<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
  protected $fillable = [
  'name','designation','description',
  ];
}
