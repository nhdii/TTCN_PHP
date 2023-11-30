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
            $table->string('detail_id', 10)->primary();
            $table->string('order_id', 10);
            $table->string('shoe_id', 10);
            $table->integer('quantity');
            $table->decimal('price',  $precision = 13, $scale = 0);
            $table->string('gender', 20);
            $table->string('size', 10);
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('shoe_id')->references('shoe_id')->on('shoes');
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
