<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_orders_children', function (Blueprint $table) {
            $table->id();
            $table->integer('po_id');
            $table->integer('product_id');
            $table->integer('purchase_qty');
            $table->double('amount', 20, 2);
            $table->double('total-amount', 20, 2);
            $table->boolean('is_received')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders_children');
    }
};
