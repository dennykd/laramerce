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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('name');
            $table->string('product_code')->unique();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->enum('condition', ['new', 'second']);
            $table->float('weight', 8, 2, true);
            $table->integer('price', false, true);
            $table->integer('stock', false, true)->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
