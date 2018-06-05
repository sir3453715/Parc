<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_sub_category', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('sub_category_id');
            $table->string('name',15);
            $table->string('en_name',50)->nullable();
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
        Schema::dropIfExists('extra_sub_category');
    }
}
