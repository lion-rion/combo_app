<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //レシピ一覧
    public function show(){
        $posts = Post::paginate(5);
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
        //dd($request);
        $keyword_title = $request->title;
        $keyword_char = $request->char;
        $keyword_min_damage = $request->min_damage;
        $keyword_max_damage = $request->max_damage;
        $keyword_when_season = $request->when_season;
        $keyword_combo_content = $request->combo_content;
        $keyword_tag_1 = $request->tag_1;
        //$keyword_tag_2 = $request->tag_2;
        //$keyword_tag_3 = $request->tag_3;
        //$keyword_tag_4 = $request->tag_4;

        if(empty($keyword_min_damage)){ //最小ダメージ部分がnullの場合は0にする
            $keyword_min_damage = 0;
        }
        if(empty($keyword_max_damage)){
            $keyword_max_damage = 9999; //最小ダメージ部分がnullの場合は0にする
        }
        $posts = Post::query()
        ->when($keyword_title, function ($q) use ($keyword_title) {
            $q->where('title', 'like', '%' . $keyword_title . '%');
        })->when($keyword_char, function ($q) use ($keyword_char) {
            $q->where('char', '=', $keyword_char);
        })->when($keyword_min_damage, function ($q) use ($keyword_min_damage) {
            $q->where('damage', '>=', $keyword_min_damage);
        })->when($keyword_max_damage, function ($q) use ($keyword_max_damage) {
            $q->where('damage', '<=', $keyword_max_damage);
        })->when($keyword_when_season, function ($q) use ($keyword_when_season) {
            $q->where('when_season', 'like', '%' . $keyword_when_season . '%');
        })->when($keyword_combo_content, function ($q) use ($keyword_combo_content) {
            $q->where('title', 'like', '%' . $keyword_combo_content . '%');
        })->when($keyword_tag_1, function ($q) use ($keyword_tag_1) {
            $q->where('tag_1', 'like', '%' . $keyword_tag_1 . '%')->orwhere('tag_2', 'like', '%' . $keyword_tag_1 . '%')
            ->orwhere('tag_3', 'like', '%' . $keyword_tag_1 . '%')->orwhere('tag_4', 'like', '%' . $keyword_tag_1 . '%');
        })->get();

        //複数カラムから検索する場合はorwhere句を使う
        
        /*
        ->when($keyword_tag_1, function ($q) use ($keyword_tag_1) {
            $q->where('title', 'like', '%' . $keyword_tag_1 . '%');
        })->when($keyword_tag_2, function ($q) use ($keyword_tag_2) {
            $q->where('title', 'like', '%' . $keyword_tag_2 . '%');
        })->when($keyword_tag_3, function ($q) use ($keyword_tag_3) {
            $q->where('title', 'like', '%' . $keyword_tag_3 . '%');
        })->when($keyword_tag_4, function ($q) use ($keyword_tag_4) {
            $q->where('title', 'like', '%' . $keyword_tag_4 . '%');
        })
        */ 

        if(empty($posts)) {
            $message = "検索結果はありません。";
            return view('post.serch')->with('message',$message);
        }

        return view('post.serch')->with([
          'posts' => $posts
        ]);

        /*
        elseif(empty($keyword_name) && !empty($keyword_char) && empty($keyword_mix_damage) && empty($keyword_max_damage) && empty($keyword_when_season) && empty($keyword_combo_content) && empty($keyword_tag)) {
            $query = Post::query(); //クエリを取得
            $posts = $query->where('title','like','%'.$keyword_name.'%')->get();
            return view('post.serch')->with([
              'posts' => $posts
            ]);
        }
        */
        
        
  }

  public function search(Request $request) {
    return view('post.search');
    }
}
