<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('full_name');
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('group_id');
            $table->string('balans')->nullable();
            $table->string('debt')->nullable();
            $table->string('birthday')->nullable();
            $table->string('course_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
