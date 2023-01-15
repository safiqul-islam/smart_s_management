<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id')->nullable();
            $table->string('teacher_name')->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->biginteger('class_id')->nullable();
            $table->biginteger('subject_id')->nullable();
            $table->biginteger('section_id')->nullable();
            $table->time('time')->nullable();
            $table->date('date')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('class_schedules');
    }
};
