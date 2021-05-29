<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_payment', function (Blueprint $table) {
            $table->id();
            $table->string('student_id',15);
            $table->string('proof');
            $table->string('payment_for');
            $table->decimal('amount',8,2);
            $table->string('notes')->nullable();
            $table->string('payment_channel')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
