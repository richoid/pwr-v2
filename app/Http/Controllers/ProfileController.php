<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\User;
use App\Client;
use App\ClientUser;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $client_users = User::with('profiles', 'clients', 'roles')->get();
        
        return view('profile.index', compact('client_users'));
    }

    public function index_for_admin() {
    //Get all users FOR A CLIENT and pass it to the view
        $all_users = User::with('profiles')->get();
        return view('users.index')->with('users', $all_users);
    }
    public function show()
	{
        $id = Auth::id();

        $client_short = 'chico';
        $client = Client::where('client_short', $client_short)->get(['id']);
        //dd($client);
        session(['client_id' => $client]);

        $profile = Profile::with('user')->where('user_id', $id)->first();

        return view('home', compact('profile'));
    }

    public function show_for_admins($id)
	{
        $profile = Profile::with('user')->where('user_id', $id)->first();

        return view('home', compact('profile'));
    }
    /**
     * CreateFromUser takes a just-registered user to the "create Profile" process
     */
    public function createFromUser()
    {
        $user = User::findOrFail(Auth::id());

        return view('profile.create', compact('user'));
    }
    /**
     * CreateFromUser allows an admin to go from "Create User" to the "Create Profile" process
     */
    public function createFromUserID($id)
    {
        $user = User::findOrFail($id);

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
        $profile = Profile::with('user', '')->where('id', $id)->update($request->except(['_token', '_method']));
        
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

        $client_user = new ClientUser;
        $client_user->client_short = $request->input('client_short');
        $client_user->client_id = ClientUser::where('client_short', $client_user->client_short)->first();
        $client_user->user_id = $profile->user_id;
        $client_user->save();

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
        $profile = Profile::with('user')->where('id', $id)->first();

        if(!empty($profile)){
            return response()->json($profile, 200);
        } else {
            return response()->json(['message' => 'no matching data'], 401);
        }
    }
}
