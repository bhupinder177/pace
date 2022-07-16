<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'category',
        'structure',
        'species',
        'status',
    ];
}
