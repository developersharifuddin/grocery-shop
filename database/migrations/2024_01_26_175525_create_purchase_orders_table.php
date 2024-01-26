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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id');
            $table->integer('total_purchase_qty');
            $table->integer('total_received_qty');
            $table->double('total_purchase_amount', 20, 2);
            $table->boolean('is_purchased')->default(0);
            $table->boolean('is_received')->default(0);
            $table->boolean('is_closed')->default(0);
            $table->integer('purchased_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
