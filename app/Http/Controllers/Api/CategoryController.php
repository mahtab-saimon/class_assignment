<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required|max:30',
        ]);
        $category = new Category;
        $category->cat_name=$request->cat_name;
        $category->save();
        return ['massage'=>'ok'];
    }


    public function show()
    {
        $categories = Category::all();
        return response()->json([
            'categories'=>$categories,
        ],200);

    }


    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);

    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cat_name' => 'required|max:30',
        ]);

        $category = Category::find($id);

        $category->cat_name=$request->cat_name;
        $category->save();

    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

    }
}
