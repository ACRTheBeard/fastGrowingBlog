<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post as Post;

class Category extends Model
{
    protected $visible = ['id','name', 'parent_category_id', 'description'];

    public function getAllPosts() {
        $categoryIds = [$this->id];
        $chilsIds = $this->getAllChildIds();

        $categoryIds = array_merge($categoryIds, $chilsIds);
        $posts = Post::whereIn('category_id', $categoryIds)
            ->latest()
            ->get();
        return $posts;
    }

    public function getAllChildIds() {
        //get all the children and collect all ids recursively
        $childCategories = Category::where('parent_category_id', $this->id)->get();

        $childIds = [];
        foreach($childCategories as $childCategory) {
            $childIds[] = $childCategory->id;
            $childCategoryIds = $childCategory->getAllChildIds();
            $childIds = array_merge($childCategoryIds, $childIds );
        }

        return $childIds;
    }


}
