<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('task_id');
            $table->string('answer');
            $table->string('student_id');
            $table->boolean('checked')->nullable();
            $table->bigInteger('coin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_tasks');
    }
}
