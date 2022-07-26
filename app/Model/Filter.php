<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'filterType',
        'filterValue',
        'displayOrder',
    ];

    public function getAllFilterTypes() {
        return $this->hasmany('App\Model\FilterRelationType','filter_id','id');
    }
}
