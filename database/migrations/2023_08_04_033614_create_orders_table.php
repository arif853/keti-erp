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
            // $table->id();
            $table->string('order_no')->unique()->primary();
            $table->string('reference')->nullable();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('order_date');
            $table->string('subtotal');
            $table->string('discount')->nullable();
            $table->string('vat')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
