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
        Schema::create('items_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('store');
            // $table->foreignId('store_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('items_id');
            // $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->string('item_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_stocks');
    }
};
