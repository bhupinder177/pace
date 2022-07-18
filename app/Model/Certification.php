<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title',
        'image',
        'status',
        'displayOrder'
    ];
}
