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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('customer_id', 10)->primary();
            $table->string('fullName', 255);
            $table->string('phone',20);
            $table->text('address', 255);
            $table->date('birthDate')->nullable();
            $table->string('gender', 10);
            $table->string('avata', 255)->default('defaultavt.png');
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
