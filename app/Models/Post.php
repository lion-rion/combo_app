<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    //可変項目 ここにテーブルのカラムを書かないと登録できない
    protected $fillable = 
    [
        'title', 'damage','char', 'combo_content', 'when_season', 'advise', 'twitter_url', 'tag_1', 'tag_2',  'tag_3', 'tag_4'
    ];

    //※※※※※※※※※※※※※※※注意ユーザーIDを投稿と結びつけるために必要※※※※※※※※※※※※※※※※※※※
    //これがないとブログ作成できません。
    public function user() {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($post) {
            $post->user_id = \Auth::id();
        });
    } 
}
