<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'slug',
    ];
}
