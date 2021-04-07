<?php

namespace App\Http\Controllers\Admin;
use App\Tag;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        $data = [
            'tags' => $tags
        ];
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $idUser = auth::id();

        $postNew = new Post();
        $postNew->user_id = $idUser;
        $postNew->slug = Str::slug($data['title']);

        $postNew->fill($data);
        // $postNew->title = $data['title'];
        // $postNew->title = $data['slug'];
        // $postNew->title = $data['content'];
        
        $postNew->save();

        if (array_key_exists('tags',$data)) {
            $postNew->tags()->sync($data['tags']);
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post_sel = Post::find($id);

        if ($post) {

            $data = [
                'post' => $post
            ];
    
            return view('admin.post.show', $data);
        }

        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post) {

            $tags = Tag::all();


            $data = [
                'post' => $post,
                'tags' => $tags
            ];
    
            return view('admin.post.edit', $data);
        }

        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $data = $request->all();
        $post->slug = Str::slug($data['title']);

        $post->fill($data);
        $post->save();

        return redirect()->route('post.show',$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
