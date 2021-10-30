<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seles', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->id();
            $table->string('nama');
            $table->string('teritory');
            // $table->foreignId('uuid')->unique();
            $table->string('kontact');
            $table->string('supervisor');
            $table->timestamps();
            // $table->foreign('uuid')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seles');
    }
}
