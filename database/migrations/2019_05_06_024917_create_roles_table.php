<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('roles', function (Blueprint $table) {
          $table->string('role');
          $table->string('createEm');
          $table->string('createRole');
          $table->string('deleteEm');
          $table->string('deleteRole');
          $table->string('createUsers');
          $table->string('editEm');
          $table->string('editRole');
          $table->string('editUsers');
          $table->string('updateEm');
          $table->string('updateRole');
          $table->string('viewEm');
          $table->string('viewRole');
          $table->timestamp();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
