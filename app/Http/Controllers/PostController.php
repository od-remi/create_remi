<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function index(Post $post)
{
    return view('posts/index')->with(['posts' => $post->getPaginateByLimit(3)]);
} 

 public function show(Post $post)
{
    return view('posts/show')->with(['post' => $post]);
}
public function create()
{
    return view('posts/create');
}
public function edit(Post $post)
{
    return view('posts/edit')->with(['post'=>$post]);
}
public function update(PostRequest $request, Post $post)
{
    $input_post=$request['post'];
    $post->fill($input_post)->save();
    
    return redirect('/posts/' . $post->id);
}
}


