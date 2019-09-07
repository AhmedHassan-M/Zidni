<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_years', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('semester_one_start')->nullable();
            $table->timestamp('semester_one_end')->nullable();
            $table->timestamp('semester_one_app_start')->nullable();
            $table->timestamp('semester_one_app_end')->nullable();
            $table->timestamp('semester_one_exam_start')->nullable();
            $table->timestamp('semester_one_exam_end')->nullable();
            $table->timestamp('semester_two_start')->nullable();
            $table->timestamp('semester_two_end')->nullable();
            $table->timestamp('semester_two_app_start')->nullable();
            $table->timestamp('semester_two_app_end')->nullable();
            $table->timestamp('semester_two_exam_start')->nullable();
            $table->timestamp('semester_two_exam_end')->nullable();
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
        Schema::dropIfExists('academic_years');
    }
}
