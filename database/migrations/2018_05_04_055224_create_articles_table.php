<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->text('body')->nullable();
            $table->tinyInteger('category')->nullable()->default('0');
            $table->tinyInteger('sub_category')->nullable()->default('0');
            $table->tinyInteger('extra_sub_category')->nullable()->default('0');
            $table->string('pic',250)->nullable();
            $table->integer('user_id')->nullable(false);
            $table->tinyInteger('lang')->default('0');
            $table->tinyInteger('lock')->default('0');
            $table->tinyInteger('active')->default('1');
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
        Schema::dropIfExists('articles');
    }
}
