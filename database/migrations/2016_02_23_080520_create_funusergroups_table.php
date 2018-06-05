<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunusergroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funusergroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('FunList');
            $table->string('UsrList');
            $table->integer('Valid');
            $table->timestamps();
            $table->integer('Oid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('funusergroups');
    }
}
