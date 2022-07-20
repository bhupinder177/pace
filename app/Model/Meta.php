<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'title',
        'description',
        'page_type',
        'keyword',
    ];
}
