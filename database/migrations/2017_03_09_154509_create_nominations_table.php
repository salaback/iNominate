<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nominee_id');
            $table->integer('tree_id');
            $table->integer('depth');
            $table->integer('user_id');
            $table->boolean('walk')->default(false);
            $table->boolean('call')->default(false);
            $table->boolean('host')->default(false);
            $table->boolean('yardSign')->default(false);
            $table->string('sign')->nullable();
            $table->boolean('fbShare')->default(false);
            $table->boolean('twShare')->default(false);
            $table->float('donate')->nullable();
            $table->dateTime('confirmed')->nullable();
            $table->json('issues')->nullable();
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
        Schema::dropIfExists('nominations');
    }
}
