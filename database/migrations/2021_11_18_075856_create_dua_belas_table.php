<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuaBelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dua_belas', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('uuid')->primary();
            $table->string('nama');
            $table->string('no_inetrn');
            $table->string('kcontact');
            $table->string('kecepatan');
            $table->longText('description')->nullable();
            $table->float('indeks');
            $table->integer('jumlah');
            // $table->string('total')->nullable();
            // $table->integer('category_id');
            // $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dua_belas');
    }
}
