<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return response()->success(compact('posts'));
    }
    
    public function get()
    {
        $posts = App\Post::all();

        return response()->success('posts', $posts);
    }

    public function update()
    {
        if ( !\Auth::user() ){
          return response()->error('Not Authorized', 401);
        }
    }
}
