<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller{

    public function posts(){
        # code...
        return view('posts', [
            'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    public function post(Post $post){
        # code...
        return view('post', ['post' => $post]);
    }
}
