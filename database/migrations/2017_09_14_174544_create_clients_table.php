<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('igreja');
            $table->string('polo');
            $table->string('liderPolo');
            $table->string('cidade');
            $table->string('whatsapp');
            $table->string('responsavel');
            $table->string('email');
            $table->integer('idade');
            $table->string('pastor');
            $table->string('liderjuventude');
            $table->string('estado');
            $table->integer('necessidade');
            $table->integer('idevento');
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
        Schema::dropIfExists('clients');
    }
}
