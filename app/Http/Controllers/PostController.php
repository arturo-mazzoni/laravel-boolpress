<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {

        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('guests.post.index', $data);
    }

    public function show($slug) {
        $post = Post::where('slug',$slug)->first();
        
        $data =[
            'post' => $post
        ];

        return view('guests.post.show', $data);
    }
}
