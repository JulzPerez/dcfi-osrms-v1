<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment', function (Blueprint $table) {
            $table->id();
            $table->string('student_id',15);
            $table->string('SY');
            $table->string('status')->default('pending');
            $table->decimal('writtenOrOnlineExamRating',8,2)->nullable();
            $table->decimal('oralExamOrInterviewRating',8,2)->nullable();
            $table->unsignedBigInteger('modality_id')->nullable();
                        
            $table->unsignedBigInteger('class_section_id')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
            $table->foreign('class_section_id')->references('id')->on('class_section')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollment');
    }
}
