<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function user_edit($id){
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }
    //
    public function user_profile($id) {
        $user = User::find($id);
        $posts = Post::find($id);
        //dd($posts);
        $user->post_count = Post::where('user_id', $user->id)->get()->count(); //投稿数を計算する変数
        //dd($user->post_count);
        return view('user.profile', [
            'user' => $user, 
            'posts' => $posts
        ]);
    }
}