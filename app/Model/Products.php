<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'product_name',
        'category_id',
        'filter_type_id',
        'thumbnail_image',
        'main_image',
        'short_description',
        'product_features',
        'product_long_description',
        'display_order',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function getAllFilters() {
        return $this->hasmany('App\Model\ProRelFilTy','pro_id','id');
    }
}