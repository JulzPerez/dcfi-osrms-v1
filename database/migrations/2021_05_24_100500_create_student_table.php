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
                $table->string('ethnicity')->nullable();
                $table->string('modality')->nullable();
                $table->string('mother_tounge')->nullable();

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
        Schema::dropIfExists('student');
    }
}
