<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('up_id')->comment('上層分類');
            $table->string('title')->comment('標題');
            $table->integer('sort')->default('10')->comment('排序');
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
        Schema::dropIfExists('event_terms');
    }
}
