<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Post;
use App\User;
use App\Client;
use App\ClientPost;
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

        $user = auth()->user();
        if ($user->hasAnyRole('staff|admin|superuser'))
        {

            return view('post.create');
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
        $meta = [];
        $user = auth()->user();
        if ($user->hasAnyRole('staff|admin|superuser'))
        {
            $input['user_id'] = Auth::id();

            //post fields
            $input['title'] = $request->title;
            $input['body'] = $request->body;
            $input['short'] = $request->short;
            $input['status'] = $request->status;

            if($request->post_type == 'calendar') {
                $input['start_date'] = $request->startDate;
                $input['end_date'] = $request->endDate;
            }

            if($request->post_type == 'alert') {
                $input['alert_level'] = $request->alert_level;
            }

            if($request->status !== 'publish') {
                //not published, there should be a date: TODO: validate for date: required
                $input['publish_date'] = $request->publish_date;

                //and make the status draft
                $input['status'] = 'draft'; 
            } else {
                // if publishing now, let's make now the publish date
                $input['publish_date'] = \Carbon\Carbon::now()->toDateTimeString();
                $input['status'] = 'publish'; 
            }

            if(!empty($request->archive_date)) {
                $input['archive_date'] = $request->archive_date;
            }
                
            
            $posted = Post::create($input);
            
            $meta['user_id'] = Auth::id();
            $meta['client_id'] = ClientNow()->id;
            $meta['client_short'] = ClientNow()->client_short;
            $meta['post_type'] = $request->post_type;
            $meta['post_id'] = $posted->id;

            $meta = ClientPost::create($meta);
            
            $post = Post::with('clients')->find($posted->id);
            
            return view('post.show', compact('post'))->with('status', 'Post created.');
        }
            
        return back()->with('status', 'Sorry, you need to be logged in to do that');
        
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

    public function destroy(Post $post)
    {
        $id = $post->id;
        $post->clients()->detach();
        $post->delete();

        return back()->with('status', 'Post ID #' . $id . ' Deleted.');
    }

}
