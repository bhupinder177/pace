<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commitees extends Model
{
  protected $fillable = [
      'name',
      'department',
      'designation',
      'displayOrder',
      'type',
  ];
}
