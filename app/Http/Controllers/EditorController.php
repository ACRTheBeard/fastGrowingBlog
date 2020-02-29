<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Category;


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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('editor');
    }

    public function category()
    {
        $categories = Category::all();
        return view('editCategories', ['categories' => $categories] );
    }

    public function post()
    {
        return view('editPosts');
    }
}
