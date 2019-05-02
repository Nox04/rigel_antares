<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messengers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('rides', function (Blueprint $table) {
            $table->foreign('messenger_id')->references('id')->on('messengers');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messengers', function (Blueprint $table) {
            $table->dropforeign('messengers_user_id_foreign');
        });

        Schema::table('rides', function (Blueprint $table) {
            $table->dropforeign('rides_messenger_id_foreign');
            $table->dropforeign('rides_user_id_foreign');
        });
    }
}
