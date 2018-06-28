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
            $table->string('description',250);
            $table->string('author',200)->nullable();
            $table->text('body')->nullable();
            $table->tinyInteger('category')->nullable()->default('0');
            $table->tinyInteger('sub_category')->nullable()->default('0');
            $table->tinyInteger('extra_sub_category')->nullable()->default('0');
            $table->string('pic',250)->nullable();
            $table->string('video_url',250)->nullable();
            $table->integer('user_id')->nullable(false);
            $table->tinyInteger('lang')->default('0');
            $table->tinyInteger('lock')->default('0');
            $table->tinyInteger('active')->default('1');
            $table->tinyInteger('display')->default('0');
            $table->date('expiry_date');
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
