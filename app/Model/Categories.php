<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  protected $fillable = [
  'name',
  'category_type',
  'thumbnail_image',
  'banner_image',
  'displayOrder',
  'description',
  ];


}
