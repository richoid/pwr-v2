<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Client;

class AlertsController extends Controller
{

    public function alerts_mobile(Post $post, $client_short)
    {
        $client = Client::where('client_short', $client_short)->first();

        $client_id = $client->id;

        $alerts = $client->posts()->wherePivot('client_short', $client_short)->wherePivot('post_type', 'alert')->get();

        return view('alerts.index_mobile', compact('alerts'));
    }

    public function alerts_api(Post $post, $client_short)
    {
        $client = Client::where('client_short', $client_short)->first();

        $client_id = $client->id;

        $alerts = $client->posts()->wherePivot('client_short', $client_short)->wherePivot('post_type', 'alert')->get();

        if(!empty($alerts)){
            return response()->json($alerts, 200);
        } else {
            return response()->json(['message' => 'no matching data'], 401);
        }
    }
}
