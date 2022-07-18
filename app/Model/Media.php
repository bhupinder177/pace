<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'title',
        'image',
        'type',
        'showOnHome',
        'displayOrder'
    ];
}
