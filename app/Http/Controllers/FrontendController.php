<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Category;
use App\Post as Post;

class FrontendController extends Controller
{
    /**
     * shows the blog public front page
     *
     * @return void
     */
    public function index(Request $request) {
        $id = $request->id;
        $currentCategory = null;

        if (!empty($id)) {
            $currentCategory = Category::where('id', $id)->get()->first();
        } else {
            $currentCategory = Category::all()->first();
        }

        $posts = $currentCategory->getAllPosts()->toJson();
        $categories = Category::all()->toJson();
        return view('home', [
            'categories' => $categories,
            'currentCategory' => $currentCategory,
            'posts' => $posts
            ]);
    }

    /**
     * shows the details of a post
     *
     * @return void
     */
    public function postDetails(Request $request) {
        $id = $request->id;

        if (!$id)
        {
            return $redirect->withErrors(['status' => 404]);
        }

        $post = Post::where('id', $id)->get()->first()->toJson();

        return view('details', ['post' => $post]);
    }
}
