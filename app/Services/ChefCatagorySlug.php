<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Model\ChefCatagory;

class ChefCatagorySlug
{
    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    static function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title, '-');

        $allSlugs = ChefCatagorySlug::getRelatedSlugs($slug, $id);

        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        for ($i = 1; $i <= 99999999; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a chef catagory unique slug');
    }

    static protected function getRelatedSlugs($slug, $id = 0)
    {
        return ChefCatagory::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}