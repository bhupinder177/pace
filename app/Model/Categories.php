<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name',
        'category_type',
        'thumbnail_image',
        'banner_image',
        'displayOrder',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    // public function getAllCatTypes() {
    //     return $this->hasmany('App\Model\CategoryRelationType','category_id','id');
    // }

    public function getCatRelFilterTypes() {
        return $this->hasmany('App\Model\CategoryRelationFilterType','category_id','id');
    }
}
