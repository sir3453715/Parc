<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoveEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('love_events', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('active')->default('1')->comment('啟用');
            $table->string('title',200)->nullable()->comment('標題');
            $table->string('description',250)->nullable()->comment('簡述');
            $table->string('author',200)->nullable()->comment('作者');
            $table->text('body')->nullable()->comment('內文');
            $table->string('tags',250)->nullable()->comment('標籤');
            $table->string('pic',250)->nullable()->comment('圖片');
            $table->integer('user_id')->nullable(false)->comment('最後修改');
            $table->tinyInteger('lang')->default('0')->comment('語言');
            $table->tinyInteger('sort')->nullable()->comment('排序');
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
        Schema::dropIfExists('love_events');
    }
}
