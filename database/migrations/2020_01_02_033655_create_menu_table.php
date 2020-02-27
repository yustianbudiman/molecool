<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_menu');
            $table->string('icon_menu');
            $table->string('link_menu');
            $table->string('deskripsi');
            $table->string('type_menu');
            $table->string('ordering');
            $table->integer('id_parent');
            $table->string('create_ip');
            $table->integer('create_by');
            $table->string('update_ip');
            $table->integer('update_by');
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
        Schema::dropIfExists('tbl_menu');
    }
}
