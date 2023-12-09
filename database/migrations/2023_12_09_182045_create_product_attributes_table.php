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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->uuid('attribute_id')->primary();
            $table->uuid('product_id');
            $table->uuid('type_id');
            $table->string('attribute_value'); 
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('type_id')->references('type_id')->on('types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};
