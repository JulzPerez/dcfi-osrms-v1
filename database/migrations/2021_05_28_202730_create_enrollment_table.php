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
            $table->increments('id');
            $table->string('student_id',15);
            $table->integer('level_id',false,true)->nullable();
            $table->integer('strand_id',false,true)->nullable();
            $table->string('SY');
            $table->string('status')->default('pending');
            $table->decimal('written_online_rating',8,2)->nullable();
            $table->decimal('oral_or_interview_rating',8,2)->nullable();
            $table->integer('modality_id',false,true)->nullable();
            $table->string('category')->nullable();
            $table->string('semester')->nullable();
                        
            $table->integer('class_section_id',false,true)->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('level')->onDelete('cascade');
            $table->foreign('strand_id')->references('id')->on('strand')->onDelete('cascade');
            $table->foreign('class_section_id')->references('id')->on('class_section')->onDelete('cascade');
            $table->foreign('modality_id')->references('id')->on('modality')->onDelete('cascade');
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
