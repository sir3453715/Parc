<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funmenu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MenuName');
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
        Schema::drop('funmenu');
    }
}
