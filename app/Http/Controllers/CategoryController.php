<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category as Category;

class CategoryController extends Controller
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
     * creates or updates a category
     *
     * @return void
     */
    public function createOrUpdate(Request $request) {
        $reqMethod = $request->method();
        $id = $request->id;
        $parentId = !empty($request->parentId) ? $request->parentId : 'root';
        $category = ($id != 'new') ? Category::find($id) : new Category;

        if ($parentId == 'root' && empty($category->parent_category_id)) {
            $category->parent_category_id = 'root';
        } elseif ($parentId != 'root' && $id == 'new') {
            $category->parent_category_id = $parentId;
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

    /**
     * deletes a category
     *
     * @return void
     */
    public function destroy(Request $request) {
        $id = $request->id;
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('editCategories');
    }


}
