<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Client;

class CalendarController extends Controller
{
    public function calendar_mobile(Post $post, $client_short)
    {
        $client = Client::where('client_short', $client_short)->first();

        $client_id = $client->id;

        $events = $client->posts()->wherePivot('client_short', $client_short)->wherePivot('post_type', 'calendar')->get();

        return view('calendar.index_mobile', compact('events'));
    }

    public function calendar_api(Post $post, $client_short)
    {
        $client = Client::where('client_short', $client_short)->first();

        $client_id = $client->id;

        $events = $client->posts()->wherePivot('client_short', $client_short)->wherePivot('post_type', 'calendar')->get();

        if(!empty($events)){
            return response()->json($events, 200);
        } else {
            return response()->json(['message' => 'no matching data'], 401);
        }
    }
}
