<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Investors extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'mobile',
        'facebook',
        'instagram',
        'twitter',
        'image',
        'type'
    ];
}
