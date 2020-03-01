<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post as Post;

class Category extends Model
{
    protected $visible = ['id','name', 'parent_category_id', 'description'];

    /**
     * returns a collection post related to this category and any of its children
     *
     * @return collection
     */
    public function getAllPosts() {
        $categoryIds = [$this->id];
        $chilsIds = $this->getAllChildIds();

        $categoryIds = array_merge($categoryIds, $chilsIds);
        $posts = Post::whereIn('category_id', $categoryIds)
            ->latest()
            ->get();
        return $posts;
    }

    /**
     * retrieve child id of all children and their children recursively
     *
     * @return array
     */
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

    /**
     * deletes the category that the instance of this model is representing
     *
     * @return void
     */
    public function delete() {
        $childCategories = Category::where('parent_category_id', $this->id)->get();
        foreach($childCategories as $childCategory) {
            $childCategory->parent_category_id = $this->parent_category_id;
            $childCategory->save();
        }

        // now that the children have become siblings handle posts
        $posts = Post::where('category_id', $this->id)->get();

        // pull a category to save the posts to
        $saveToCategory = Category::where('id', '<>', $this->id)->get()->first();

        foreach($posts as $post) {
            // check to see if we have a parent id to hand off our post too
            if ( empty($this->parent_category_id)) {
                // check to see that we have anymore categories left at all
                if(empty($saveToCategory)) {
                    // if we don't have any more categories, the blog is finished, lets start over
                    $post->delete();
                } else {
                    $post->category_id = $saveToCategory->id;
                }
            } else {
                $post->category_id = $this->parent_category_id;
            }
            $post->save();
        }

        // now that we are no longer associated with anything we can
        // safely delete
        parent::delete();
    }


}
