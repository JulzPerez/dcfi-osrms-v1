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
            $table->string('student_id');
            $table->string('SY');
            $table->string('status')->default('pending');
            $table->decimal('writtenOrOnlineExamRating',8,2)->nullable();
            $table->decimal('oralExamOrInterviewRating',8,2)->nullable();
            $table->string('payment_proof_filename')->nullable();
            /* $table->unsignedBigInteger('modality_id');
            $table->unsignedBigInteger('payment_id');            
            $table->unsignedBigInteger('class_section_id');*/
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
        Schema::dropIfExists('enrollment');
    }
}
