<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FilterRelationType extends Model
{
    protected $fillable = [
        'filter_id',
        'filter_type_id',
    ];
}
