<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // protected $table = "trns00g_order_master";

    public function up(): void
    {
        Schema::create('order_masters', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id(); 
=======
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->string('name');
            $table->decimal('price');
            $table->string('customer_id');
            $table->string('sell_date');
            $table->string('sell_status');
            $table->string('reference_no');
            $table->string('bar_code');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_qty');
            $table->string('product_discount');
            $table->string('product_tax');
            $table->string('product_total_amount');
            $table->string('others_charge');
            $table->string('others_charge_amount');
            $table->string('discount_type');
            $table->string('extra_discount');
            $table->string('sales_note');
            $table->string('total_payable_amount');
            $table->string('payment_type');
            $table->string('payment_note');
            $table->string('sent_sms');
            $table->string('status')->default('Pending');
>>>>>>> 45766a2e5ce09343def635b34ddc72eda13f3c90
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_masters');
    }
};
