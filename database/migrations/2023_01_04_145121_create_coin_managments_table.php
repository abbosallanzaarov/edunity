<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinManagmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_managments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->bigInteger('coin');
            $table->bigInteger('false_answer');
            $table->bigInteger('true_answer');
            $table->bigInteger('max_coin');
            $table->bigInteger('min_coin');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_managments');
    }
}
