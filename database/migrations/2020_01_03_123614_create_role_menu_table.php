<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_role_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_role');
            $table->integer('id_menu');
            $table->integer('action_create');
            $table->integer('action_read');
            $table->integer('action_update');
            $table->integer('action_delete');
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
        Schema::dropIfExists('tbl_role_menu');
    }
}
