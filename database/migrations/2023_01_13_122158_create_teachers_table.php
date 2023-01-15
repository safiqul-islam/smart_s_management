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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('teacher_id')->nullable();
            $table->bigInteger('photo_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('blood_group',['A+','A-','B+','B-','O+','O-','AB+'])->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->enum('religion',['Islam','Hindu','Christian','Buddhism'])->nullable();
            $table->string('class_id')->nullable();
            $table->string('section_id')->nullable();
            $table->longtext('address')->nullable();
            $table->longText('short_bio')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
