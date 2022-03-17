<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); 
            $table->text('char'); //キャラクター選択
            $table->integer('damage'); //ダメージ
            $table->string('title',100); //タイトル・コンボの名前など
            $table->text('combo_content'); //コンボ内容
            $table->text('advise')->nullable(); //アドバイス・コツなど
            $table->text('twitter_url')->nullable(); //ツイッターのurlを記載
            $table->text('when_season')->nullable(); //シーズン対応
            $table->text('tag_1')->nullable(); //タグ1
            $table->text('tag_2')->nullable(); //タグ2
            $table->text('tag_3')->nullable(); //タグ3
            $table->text('tag_4')->nullable(); //タグ4
            $table->foreignId('user_id')->constrained(); //ユーザーID追加
            $table->timestamps(); //日付 
            //あと質問機能・記事投稿機能もいつか追加したい
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
