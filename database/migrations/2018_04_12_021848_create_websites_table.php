<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('url');
            $table->string('image');
            $table->integer('alexa')->nullable();
            $table->timestamps();
        });

        Schema::table('websites', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
