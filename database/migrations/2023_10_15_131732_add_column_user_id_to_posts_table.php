<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUserIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->unsignedBigInteger('user_id');  //postsテーブルにuser_idカラムを追加
          $table->foreign('user_id')->references('id')->on('users');  // ユーザーテーブルに対する外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->dropColumn('user_id'); //user_idを削除するメソッドを追加
          $table->dropForeign(['user_id']);  //外部キー制約の解除
        });
    }
}
