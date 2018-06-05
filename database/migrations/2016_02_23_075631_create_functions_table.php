<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FunName');
            $table->string('FunLink');
            $table->string('FunDesc');
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
        Schema::drop('functions');
    }
}
