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
            $table->string('reference');
            $table->string('credit_limit');
            $table->string('business_name');
            $table->string('owner_name');
            $table->string('phone');
            $table->string('phone2');
            $table->string('email');
            $table->string('bill_address');
            $table->string('del_address');
            $table->string('acc_group');
            $table->string('open_balance');
            $table->string('t_license');
            $table->string('tin');
            $table->string('man_name');
            $table->string('man_phone');
            $table->string('man_title');
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
