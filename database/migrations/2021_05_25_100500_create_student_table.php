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
                $table->string('id',15)->unique()->primary();
                $table->unsignedBigInteger('user_id');    
                $table->string('first_name');
                $table->string('middle_name');
                $table->string('last_name');
                $table->string('name_extension')->nullable();
                $table->string('home_address');      
                $table->string('sex');
                $table->date('birthdate');
                $table->string('birthplace');
                $table->string('citizenship');
                $table->string('religion');
                $table->string('no_siblings');
                $table->string('birth_order');
                $table->string('father_fullname');
                $table->string('mother_fullname');    
                $table->string('student_type')->default('prospective student');  
                $table->string('student_status')->default('pending');      
    
                $table->timestamps();
    
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    
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
