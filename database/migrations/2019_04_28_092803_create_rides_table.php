<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('name');
            $table->string('phone', 25);
            $table->string('neighborhood')->nullable();
            $table->text('details')->nullable();
            $table->enum('status', ['inactive', 'pending', 'active', 'finished'])->default('inactive');
            $table->dateTime('end')->nullable();
            $table->integer('messenger_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
