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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('order_id')->primary();
            $table->uuid('customer_id');
            $table->date('order_date')->default(now());
            $table->date('delivery_date')->nullable();
            $table->string('status')->default('Pending');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->timestamps();

        });

         // Thêm ràng buộc WHERE RAW
        DB::statement('ALTER TABLE orders ADD CONSTRAINT check_delivery_date_after_order_date 
                        CHECK (delivery_date IS NULL OR delivery_date >= order_date)');
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
