<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //レシピ一覧
    public function show(){
        $posts = Post::all();
        // dd($blogs); これを使うと$blogsの中身を見ることができる
        return view('post.index',['posts' => $posts]);
    }

    //ブログ詳細を表示する 引数はid
    public function showDetail($id){
        $post = Post::find($id);
        if(is_null($post)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('posts'));
        }
        return view('post.detail',['post' => $post]);
    }

    //登録画面を表示させるためだけなのでviewを返せばいい
    public function showCreate(){
        return view('post.form');
    }

    //ブログ登録
    public function exeStore(PostRequest $request){

        //ブログデータを受け取る
        $inputs = $request->all();
        //dd($inputs);
        \DB::beginTransaction();
        //ブログ登録時のエラー対応
        try {
            //ブログ登録
            Post::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        //ブログを登録
        \Session::flash('err_msg', 'ブログを登録しました');
        return redirect(route('posts')); 
    }
     //ブログ編集フォームを表示する 引数はid
     public function showEdit($id){
        $post = Post::find($id);
        if(\Auth::user()->id == $post->user_id){
        if(is_null($post)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('posts'));
        }
        return view('post.edit',['post' => $post]);
        }else{
        abort(403);
        }
    }

    public function exeUpdate(PostRequest $request){

        //バリデーションが同じなのでBlogRequestは同じ
        //ブログデータを受け取る
        $inputs = $request->all();
        \DB::beginTransaction();
        //ブログ更新のエラー対応
        try {
            //ブログ登録
            $post = Post::find($inputs['id']);
            $post->fill([
                'title' => $inputs['title'],
                'content' => $inputs['combo_content'],
                'advise' => $inputs['advise'],
                'twitterUrl' => $inputs['twitter_url'],
                'season5' => $inputs['when_season']
            ]);
            $post->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }

        //ブログを更新
        
        \Session::flash('err_msg', 'ブログを更新しました');
        return redirect(route('posts'));
    }

     //ブログ削除フォームを表示する 引数はid
     public function exeDelete($id){
        $post = Post::find($id);
        if(empty($id)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('posts'));
        }
        try {
            //ブログ削除
            Post::destroy($id);
        }catch(\Throwable $e){
            abort(500);
        }
        \Session::flash('err_msg', 'ブログを削除しました');
        return redirect(route('posts')); 
        }
 //       else{
   //         abort(403);
     //   }
    //}


    /*------検索機能-----*/
    public function serch(Request $request) {
        $keyword_name = $request->name;
        $keyword_age = $request->age;
        $keyword_sex = $request->sex;
        $keyword_age_condition = $request->age_condition;
  
        if(!empty($keyword_name) && empty($keyword_age) && empty($keyword_age_condition)) {
        $query = Post::query();
        $posts = $query->where('title','like','%'.$keyword_name.'%')->get();
        $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
        return view('post.serch')->with([
          'posts' => $posts,
          'message' => $message,
        ]);
        }
        elseif(!empty($keyword_name) && empty($keyword_age) && empty($keyword_age_condition)) {
        return $this->orderBy('created_at', 'desc')->get();
        }
      else {
        $message = "検索結果はありません。";
        return view('post.serch')->with('message',$message);
        }

        
  }

  public function search(Request $request) {
    return view('post.search');
    }
}
