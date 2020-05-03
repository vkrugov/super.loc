<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //init user
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('gender_id');
            $table->string('password');
            $table->integer('created_at');
        });

        //init hero
        Schema::create('hero', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname')->unique();
            $table->string('real_name');
            $table->text('origin_description');
            $table->text('catch_phrase');
            $table->string('last_updater');
            $table->integer('updated_at');
            $table->integer('created_at');
        });

        //init power
        Schema::create('power', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description');
        });

        //init hero_power
        Schema::create('hero_power', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hero_id')->unsigned();
            $table->bigInteger('power_id')->unsigned();

            $table->foreign('hero_id')->references('id')->on('hero');
            $table->foreign('power_id')->references('id')->on('power');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('hero');
        Schema::dropIfExists('power');
        Schema::dropIfExists('power');
    }
}
