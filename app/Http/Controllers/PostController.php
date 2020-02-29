<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


class PostController extends Controller
{
    public function createOrUpdate(Request $request) {
        $reqMethod = $request->method();
        $id = $request->id;

        $categories = Category::all();
        $categorList = [];
        foreach ($categories as $category) {
            $categorList[$category->id ] = $category->name;
        }

        $post = ($id != 'new') ? Post::find($id) : new Post;

        if ($reqMethod == 'POST') {
            $post->name = $request->name;
            $post->category_id = $request->category_id;
            $post->content = $request->content;
            $post->short_content = $request->short_content;
            $post->save();
            return redirect()->route('post', ['id' => $post->id]);
        }

        return view('post', $post, ['categories' => $categorList]);
    }
}
