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
            $table->id();
            $table->string('reference')->nullable();
            $table->string('credit_limit')->nullable();
            $table->string('business_name');
            $table->string('owner_name');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('del_address');
            $table->string('acc_group');
            $table->string('open_balance')->nullable();
            $table->string('t_license')->nullable();
            $table->string('tin')->nullable();
            $table->string('man_name')->nullable();
            $table->string('man_phone')->nullable();
            $table->string('man_title')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
