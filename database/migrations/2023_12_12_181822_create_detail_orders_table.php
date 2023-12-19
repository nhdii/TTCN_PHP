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
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->uuid('order_id');
            $table->uuid('product_id');
            $table->uuid('attribute_id');
            $table->integer('quantity');
            $table->decimal('price',  $precision = 13, $scale = 0);
            $table->text('notes')->nullable();

            //add primaryKey
            $table->primary(['order_id', 'product_id', 'attribute_id']);
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('attribute_id')->references('attribute_id')->on('product_attributes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
