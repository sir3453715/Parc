<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexKvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_kv', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active')->default('1');
            $table->string('type',100);
            $table->string('title',200)->nullable();
            $table->string('author',200)->nullable();
            $table->string('body',250)->nullable();
            $table->string('pic',250)->nullable();
            $table->string('link',250)->nullable();
            $table->tinyInteger('lang')->default('0');
            $table->tinyInteger('order')->default('0');
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
        Schema::dropIfExists('index_kv');
    }
}
