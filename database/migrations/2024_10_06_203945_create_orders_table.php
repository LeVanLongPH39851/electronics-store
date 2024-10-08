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
            $table->id();
            $table->string('order_code', 20)->unique();
            $table->enum('status', ['cxn', 'clh', 'dgh', 'ghtc', 'dh']);
            $table->enum('payment_method', ['cod', 'online']);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phone', 15);
            $table->string('address', 255);
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
