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
        Schema::create('payment_to_suppliers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('spo_id');
            $table->double('payable_amount');
            $table->double('due_amount')->nullable();
            $table->double('paid_amount')->nullable();
            $table->boolean('is_closed')->default(false);
            $table->timestamps();
            $table->timestamp('updated_at')->nullable();

            // Define foreign key constraints if needed
            // $table->foreign('supplier_id')->references('id')->on('suppliers');
            // $table->foreign('spo_id')->references('id')->on('purchase_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_to_suppliers');
    }
};
