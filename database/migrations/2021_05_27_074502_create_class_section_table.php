<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_section', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('strand_id',false,true)->nullable();
            $table->integer('section_id',false,true)->nullable();
            $table->integer('school_year_id',false,true);
            $table->integer('level_id',false,true);
            $table->string('semester')->nullable();            
            $table->string('room')->nullable();
            $table->integer('capacity')->nullable();

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
        Schema::dropIfExists('class_section');
    }
}
