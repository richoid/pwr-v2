<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $path = '/images/users/avatar/';
        $imageName = Auth::id() . '.jpg';
        request()->image->move(public_path($path), $imageName);

        $profile = Profile::where('user_id', Auth::id())->update('avatar_url', $imageName);


        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

}