<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Post;
use App\User;
use App\Client;
use App\Profile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PostController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['clients','profiles'])->get();

        if(!empty($posts)){
            return view('post.index', compact('posts'));
        } else {
            return view('post.index')->with('message', ['There are no posts, yet.']);
        }
    }
    public function posts_for_client(Post $post, $client_short)
    {
        $client = Client::where('client_short', $client_short)->first();

        $client_id = $client->id;

        $posts = $client->posts()->wherePivot('client_short', $client_short)->get();

        return view('post.index_for_client', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(auth()->user());

        $user = auth()->user();
        if ($user->hasAnyRole('staff|admin|superuser'))
        {
            return view('post.create', compact('current_user','current_client'));
        }
            return back()->with('status', 'Sorry, you need to be logged in to do that');
        
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
        return view('post.show', compact('post'))->with('status', 'Post created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
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
        dd($post . ' : ' . $request);
        return view('post.show', compact('post'))->with('status', 'Post Saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        dd($post);
        return view('post.index', compact('post'))->with('status', 'Post Deleted.');
    }
}
