<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            // customer
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('comments');
            // transaction
            $table->integer('gross_amount');
            $table->string('transaction_id');
            $table->string('payment_token');
            $table->string('transaction_status')->default('pending');
            $table->string('payment_type')->nullable();
            // shipping
            $table->string('province');
            $table->string('city');
            $table->string('cost');
            $table->text('address');
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
        Schema::dropIfExists('orders');
    }
};
