<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Profile;

class ImageUploadController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUpload()
    {
        return view('profile.includes.avatar_upload');
    }

    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUploadPost()
    {
        request()->validate([
            'avatar_url' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $path = '/images/users/avatar/';
        $imageName = Auth::id() . '.jpg';
        request()->avatar_url->move(public_path($path), $imageName);

        $profile = Profile::where('user_id', Auth::id())->update(['avatar_url' => $imageName]);


        return back()
            ->with('success','You have successfully upload image.')
            ->with('avatar_url',$imageName);
    }

}