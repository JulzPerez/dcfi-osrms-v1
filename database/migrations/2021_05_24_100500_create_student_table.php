<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
                $table->string('id',15)->primary();
                $table->string('LRN',50)->nullable();
                $table->unsignedBigInteger('user_id');    
                $table->string('first_name');
                $table->string('middle_name');
                $table->string('last_name');
                $table->string('name_extension')->nullable();     
                $table->string('sex');
                //$table->smallInteger('age')->nullable();
                $table->date('birthdate');
                $table->string('contact_no');
                $table->string('birthplace');
                $table->string('citizenship');
                $table->string('religion');
                $table->string('no_siblings');
                $table->string('birth_order');
                $table->string('student_type')->default('prospective student');  
                $table->string('student_status')->default('pending');    
                $table->string('picture')->default('profile.png'); 
                $table->string('purok')->nullable(); 
                $table->string('municipality')->nullable(); 
                $table->string('province')->nullable();

                $table->string('father_fullname')->nullable();
                $table->string('father_occupation')->nullable();
                $table->string('mother_fullname')->nullable();
                $table->string('mother_occupation')->nullable();

                $table->unsignedBigInteger('ethnicity_id')->nullable();
                $table->unsignedBigInteger('modality_id')->nullable();
                $table->unsignedBigInteger('mother_tounge_id')->nullable();

                $table->timestamps();

                $table->foreign('ethnicity_id')->references('id')->on('ethnicity')->onDelete('cascade'); 
                $table->foreign('modality_id')->references('id')->on('modality')->onDelete('cascade'); 
                $table->foreign('mother_tounge_id')->references('id')->on('mother_tounge')->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
