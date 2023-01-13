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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->nullable();
            $table->bigInteger('photo_id')->nullable();
            $table->string('book_name')->nullable();
            $table->string('subject')->nullable();
            $table->string('writer_name')->nullable();
            $table->string('class')->nullable();
            $table->date('publishing_date')->nullable();
            $table->date('upload_date')->nullable();
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
        Schema::dropIfExists('books');
    }
};
