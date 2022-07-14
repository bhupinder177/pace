<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallary extends Model
{
    protected $fillable = [
        'title',
        'image',
        'status',
    ];
}
