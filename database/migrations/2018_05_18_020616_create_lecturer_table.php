<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('category_detail')->nullable();
            $table->string('job_title')->nullable();
            $table->text('body')->nullable();
            $table->string('pic',250)->nullable();
            $table->tinyInteger('lang')->default('0');
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
        Schema::dropIfExists('lecturer');
    }
}
