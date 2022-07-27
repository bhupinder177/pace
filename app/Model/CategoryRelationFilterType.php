<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryRelationFilterType extends Model
{
    protected $fillable = [
        'category_id',
        'filter_type_id',
    ];
}
