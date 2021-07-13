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
                $table->unsignedBigInteger('user_id')->nullable();    
                $table->string('first_name');
                $table->string('middle_name');
                $table->string('last_name');
                $table->string('name_extension')->nullable();     
                $table->string('sex');
                
                $table->date('birthday');
                $table->string('contact_no')->nullable();
                $table->smallInteger('age');
                $table->string('birthplace');
                $table->string('citizenship');  
                $table->string('religion')->nullable();
                $table->string('no_siblings');
                $table->string('birth_order');
                $table->string('email_add')->nullable();
                $table->string('student_type')->nullable();  
                $table->string('student_status')->nullable();    
                $table->string('picture')->nullable(); 
                $table->string('purok')->nullable(); 
                $table->integer('municipality_no',false,true)->nullable(); 
                $table->integer('city_no',false,true)->nullable();
                $table->integer('ethnicity_id',false,true)->nullable();
                $table->integer('guardian_id',false,true)->nullable();

                $table->integer('modality_id',false,true)->nullable();
                $table->integer('mother_tongue_id',false,true)->nullable();
               
                $table->timestamps();

                $table->foreign('municipality_no')->references('number')->on('municipality')->onDelete('cascade'); 
                $table->foreign('city_no')->references('number')->on('city')->onDelete('cascade'); 
                $table->foreign('guardian_id')->references('id')->on('guardian')->onDelete('cascade'); 

                $table->foreign('ethnicity_id')->references('id')->on('ethnicity')->onDelete('cascade'); 
                $table->foreign('modality_id')->references('id')->on('modality')->onDelete('cascade'); 
                $table->foreign('mother_tongue_id')->references('id')->on('mother_tongue')->onDelete('cascade');  
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
