<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->integer('office_id')->nullable();
            $table->string('email')->unique();
            $table->string('party')->nullable();
            $table->string('avatar')->nullable();
            $table->text('candidateStatement')->nullable();
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
        Schema::dropIfExists('nominees');
    }
}
