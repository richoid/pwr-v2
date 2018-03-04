<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function sociable($id) {
        $sociable = Social::where('sociable_id', $id);

        return view('profile.social', compact('sociable'));
    }
}
