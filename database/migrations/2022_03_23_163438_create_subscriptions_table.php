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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('subscribe_user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->index('user_id', 'subscription_user_idx');
            $table->foreign('user_id', 'subscription_user_fk')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');

            $table->index('subscribe_user_id', 'subscription_subscribe_user_idx');
            $table->foreign('subscribe_user_id', 'subscription_subscribe_user_fk')
                ->on('users')
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
        Schema::dropIfExists('subscriptions');
    }
};
