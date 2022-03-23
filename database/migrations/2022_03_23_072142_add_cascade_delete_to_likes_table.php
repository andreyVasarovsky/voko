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
        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign('like_user_fk');
            $table->dropForeign('like_article_fk');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id', 'like_user_fk')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('article_id', 'like_article_fk')
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
        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign('like_user_fk');
            $table->dropForeign('like_article_fk');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id', 'like_user_fk')
                ->on('users')
                ->references('id');

            $table->foreign('article_id', 'like_article_fk')
                ->on('articles')
                ->references('id');
        });
    }
};
