<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $fillable = [
        'title',
        'status',
        'display_order',
    ];

    public function resourceAllAttachments()
    {
        return $this->hasmany('App\Model\ResourcesAttachment','resources_id','id');
    }
}
