<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunmenudetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funmenudetail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FunMenuId');
            $table->integer('FunId');
            $table->integer('Valid');
            $table->integer('Corder');
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
        Schema::drop('funmenudetail');
    }
}
