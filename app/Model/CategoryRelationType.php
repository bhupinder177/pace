<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryRelationType extends Model
{
    protected $fillable = [
        'category_id',
        'category_type_id',
    ];
}
