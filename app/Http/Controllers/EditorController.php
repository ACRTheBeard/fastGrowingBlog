<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Category;
use App\Post as Post;


class EditorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application editor dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('editor');
    }

    /**
     * shows the a category dashboard
     *
     * @return void
     */
    public function categories()
    {
        $categories = Category::all();
        return view('editCategories', ['categories' => $categories] );
    }

    /**
     * shows the a post dashboard
     *
     * @return void
     */
    public function posts()
    {
        $posts = Post::all();
        return view('editPosts', ['posts' => $posts]);
    }
}
