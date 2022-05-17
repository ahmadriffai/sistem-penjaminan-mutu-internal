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
        Schema::create('school_years', function (Blueprint $table){
           $table->uuid('id')->primary();
           $table->integer('year');
           $table->enum('semester', [1,2]);

           $table->timestamps();
        });
        Schema::create('journals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('link');
            $table->integer('year');
            $table->string('month');
            $table->string('media');
            $table->string('issn');
            $table->string('criteria');
            $table->string('category');
            $table->uuid('lecturer_id');
            $table->uuid('school_year_id');
            $table->boolean('isAccept')->default(0);

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('school_year_id')->references('id')->on('school_years');

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
        Schema::dropIfExists('journals');
        Schema::dropIfExists('school_years');
    }
};
