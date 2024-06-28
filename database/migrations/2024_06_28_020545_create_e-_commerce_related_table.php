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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->foreignId('user_id')->constrained();
            $table->integer('quantity');
            $table->enum('status', ['unpaid', 'paid', 'delivered', 'canceled']);
            $table->timestamps();
        });

        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('order');
            $table->foreignId('product_id')->constrained('product');
            $table->timestamps();
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('order');
            $table->string('payment_number');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_detail');
        Schema::dropIfExists('payment');
    }
};
