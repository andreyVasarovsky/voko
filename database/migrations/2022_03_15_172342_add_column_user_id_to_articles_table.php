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
        Schema::table('articles', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable()->after('category_id');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->index('user_id', 'article_user_idx');
            $table->foreign('user_id', 'article_user_fk')
                ->on('users')
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
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('article_user_fk');
            $table->dropIndex('article_user_idx');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
