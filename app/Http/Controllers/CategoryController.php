<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Category;

class CategoryController extends Controller
{
    public function createOrUpdate(Request $request) {
        $reqMethod = $request->method();
        $id = $request->id;
        $parentId = !empty($request->parentId) ? $request->parentId : 'root';
        $category = ($id != 'new') ? Category::find($id) : new Category;

        if ($parentId == 'root' && empty($category->parent_category_id)) {
            $category->parent_category_id = 'root';
        }

        if ($reqMethod == 'POST') {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->parent_category_id = $category->parent_category_id != 'root'? $category->parent_category_id : null;
            $category->save();

            if ($parentId == 'root') {
                return redirect()->route('rootCategory', ['id' => $category->id]);
            }
            return redirect()->route('childCategory', ['id' => $category->id, 'parentId' => $category->parent_category_id]);
        }

        // get the children
        $children = Category::where('parent_category_id', $id)->get();
        return view('category', $category, ['children' => $children]);
    }


}