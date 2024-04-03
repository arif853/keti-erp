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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->string('unit');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('barcode_id');
            // $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('brand_id');
            // $table->foreignId('catagory_id')->constrained()->onDelete('cascade');
            $table->string('catagory_id');
            // $table->foreignId('product_model_id')->constrained()->onDelete('cascade');
            $table->string('product_model_id');
            $table->string('product_cost');
            $table->string('product_vat')->nullable();
            $table->string('product_charge')->nullable();
            $table->string('product_mrp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
