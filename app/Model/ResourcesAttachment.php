<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResourcesAttachment extends Model
{
    protected $fillable = [
        'resources_id',
        'image',
    ];
}
