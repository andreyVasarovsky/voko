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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->index('user_id', 'like_user_idx');
            $table->foreign('user_id', 'like_user_fk')
                ->on('users')
                ->references('id');

            $table->index('article_id', 'like_article_idx');
            $table->foreign('article_id', 'like_article_fk')
                ->on('articles')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
