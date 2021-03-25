<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showProduct(){
        $post=Post::all();
        return view('admin_layouts.pages.allProduct',compact('post'));
    }
}
