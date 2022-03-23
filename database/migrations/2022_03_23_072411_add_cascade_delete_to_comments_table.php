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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comment_user_fk');
            $table->dropForeign('comment_article_fk');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id', 'comment_user_fk')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('article_id', 'comment_article_fk')
                ->on('articles')
                ->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comment_user_fk');
            $table->dropForeign('comment_article_fk');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id', 'comment_user_fk')
                ->on('users')
                ->references('id');

            $table->foreign('article_id', 'comment_article_fk')
                ->on('articles')
                ->references('id');
        });
    }
};
