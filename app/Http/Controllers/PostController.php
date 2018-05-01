<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO: all posts (role:superuser)
        $posts = Post::all();

        return view(posts.index, compact('posts'));
    }
    public function index_by_client($id)
    {
        //TODO: all posts (role:superuser)
        $posts = Post::where('id', $id)->get();

        return view(posts.index_by_client, compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check())
        {
            return view('post.create', compact('current_user','current_client'));
        }
            return back()->with('status', 'Sorry, you&rsquo;ll need to be logged in to do that');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check())
        {
            // process the form to create a client in the db
            $input = $request->all();
            $post = Post::create($input);
            return view('post.show', compact('post'))->with('status', 'Post created.');
        }
            return back()->with('status', 'Sorry, you&rsquo;ll need to be logged in to do that');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
