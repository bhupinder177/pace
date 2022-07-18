<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'status',
        'designation',
        'experience',
        'displayOrder',
        'postedOn'
    ];
}
