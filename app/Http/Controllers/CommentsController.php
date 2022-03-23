<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

   public function store(Request $request)
   {

       $comment = new Comment();
       $comment->comment = $request->comment;
       $comment->post_id = $request->post_id;
       $comment->user_id = \Auth::user()->id;
       //dd($comment);
       $comment->save();

       return redirect()->back();
   }

    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect()->back();
    }
}
