<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('student_id');
            $table->bigInteger('gift_id');
            $table->bigInteger('coin');
            $table->boolean('submitted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_histories');
    }
}
