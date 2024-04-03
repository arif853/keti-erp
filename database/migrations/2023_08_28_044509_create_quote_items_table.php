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
        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();
            // $table->string('quotation')->references('quotation_no')->on('quotes');
            // $table->foreign('quotation')->references('quotation_no')->on('quotes')->onDelete('cascade');
            $table->string('quotation');
            // $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->string('items');
            $table->string('quantity');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_items');
    }
};
