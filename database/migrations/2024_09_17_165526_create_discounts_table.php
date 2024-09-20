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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Discount name (Family Discount, Recurring Discount, etc.)
            $table->enum('type', ['fixed', 'percentage']); // Type of discount
            $table->decimal('amount', 8, 2); // Discount amount
            $table->integer('max_uses')->nullable(); // Maximum number of uses allowed for the discount
            $table->decimal('max_discount', 8, 2)->nullable(); // Maximum discount cap
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
