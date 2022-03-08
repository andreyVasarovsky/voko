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
        Schema::create('article_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->timestamps();


            $table->index('article_id', 'article_tags_article_idx');
            $table->index('tag_id', 'article_tags_tag_idx');

            $table->foreign('article_id', 'article_tags_article_fk')->on('articles')->references('id')->onDelete('cascade');;
            $table->foreign('tag_id', 'article_tags_tag_fk')->on('tags')->references('id')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tags');
    }
};
