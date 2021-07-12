<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id',false,true);
            $table->integer('fee_id',false,true);
            $table->decimal('amount',8,2);
            $table->timestamps();

            $table->foreign('bill_id')->references('id')->on('bill')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_fees');
    }
}
