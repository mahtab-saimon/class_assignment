<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poduct;


class ProductController extends Controller
{
    public function show()
    {
        $posts = Poduct::all();

        return response()->json([
            'posts'=>$posts,
        ],200);
    }
    public function store(Request $request)

    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'description' => 'required|max:1000',
        ]);
        $post = new Poduct();
        $post->title=$request->title;
        $post->name=$request->name;
        $post->price=$request->price;
        $post->description=$request->description;
        $post->save();
        }


    public function edit($id)
    {
        $post = Poduct::find($id);
        return response()->json([
            'post'=>$post
        ],200);

    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'description' => 'required|max:1000',
        ]);
        $post = new Poduct();
        $post = Poduct::find($id);
        $post->title=$request->title;
        $post->name=$request->name;
        $post->price=$request->price;
        $post->description=$request->description;
        $post->update();


    }


    public function destroy($id)
    {
        $post = Poduct::find($id);
        $post->delete();
    }


}
