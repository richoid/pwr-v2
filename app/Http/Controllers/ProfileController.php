<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        $profiles = User::with('profiles')->get();

        return view('profile.index', compact('profiles'));
    }
    public function show()
	{        
        $id = Auth::id();
        $profile = Profile::with('user','social')->where('user_id', $id)->first();

        return view('home', compact('profile'));
    }
    public function createFromUser()
    {
        $user = User::findOrFail(Auth::id());

        return view('profile.create', compact('user'));
    }
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', compact('profile'));
    }
    public function update($id, Request $request)
    {
        // Validate the request...
        $profile = Profile::where('id', $id)->update($request->except(['_token', '_method']));

        return view('home', compact('profile'))->with('message', 'Profile updated.');
    }
    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->user_id = $request->input('user_id');
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->email = $request->input('email');
        $profile->phone_m = $request->input('phone_m');
        $profile->phone_h = $request->input('phone_h');
        $profile->phone_w = $request->input('phone_w');
        $profile->street_address = $request->input('street_address');
        $profile->address_locality = $request->input('address_locality');
        $profile->address_region = $request->input('address_region');
        $profile->postal_code = $request->input('postal_code');
        $profile->phone_prefs = $request->input('phone_prefs');
        $profile->save();
                

        return redirect('home')->with('message', 'Profile saved.');
    }

    public function delete($id)
    {
        $profile = App\Profile::findOrFail($id);
        $profile->delete();
        
        return redirect('/users')->with('message', 'User record updated.');
    }

    public function api_profile(Request $request, $id)
    {
        $profile = Profile::with('user','social')->where('id', $id)->first();
        return return response()->json($profile);
    }
}
