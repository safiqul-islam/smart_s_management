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
        Schema::create('hostel_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('hostel_name')->nullable();
            $table->integer('hostel_id')->nullable();
            $table->string('room_number')->nullable();
            $table->enum('room_type',['Small','Medium','Large'])->nullable();
            $table->integer('bed_number')->nullable();
            $table->float('cost_per_bed')->nullable();
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
        Schema::dropIfExists('hostel_rooms');
    }
};
