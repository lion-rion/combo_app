<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    //
    public function user_profile($id) {
        $user = User::find($id);
        return view('user.profile', ['user' => $user]);
    }
}