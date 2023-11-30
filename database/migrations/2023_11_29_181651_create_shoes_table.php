<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->string('shoe_id', 10)->primary();
            $table->string('shoe_name', 255);
            $table->text('desciption');
            $table->decimal('default_price',  $precision = 13, $scale = 0);
            $table->integer('default_stock_quantity');
            $table->string('image');
            $table->string('brand_id', 10);
            $table->string('category_id', 10);
            $table->string('gender', 20);
            $table->string('size', 10);
            $table->foreign('brand_id')->references('brand_id')->on('brands');
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
