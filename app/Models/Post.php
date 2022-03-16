<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    //可変項目
    protected $fillable = 
    [
        'title', 'char', 'combo_content', 'when_season', 'advise', 'twitter_url'
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
