<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    

    public function show($id) {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function edit($id) {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function update($id, Request $request) {
        $user = Auth::user();
        $form = $request->all();

        $profileImage = $request->file('profile_image');
        if ($profileImage != null) {
            $form['profile_image'] = $this->saveProfileImage($profileImage, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect('/home');
    }

    private function saveProfileImage($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        \Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }
}