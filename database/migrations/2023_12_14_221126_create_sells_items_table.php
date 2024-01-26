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
        Schema::create('sells_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id(); // Auto-incremental primary key
            $table->integer('store_id')->nullable(); // Nullable integer column for store_id
            $table->unsignedBigInteger('sell_id'); // Unsigned big foreignId column for sell_id
            $table->unsignedBigInteger('product_id'); // Unsigned big foreignId column for product_id
            $table->string('bar_code')->nullable(); // Nullable string column for bar_code
            $table->string('qr_code')->nullable(); // Nullable string column for qr_code
            $table->double('discount_amount')->nullable(); // Nullable double column for discount_amount
            $table->double('published_price'); // Double column for published_price
            $table->double('sell_price', 20, 2)->nullable(); // Nullable double column for sell_price with precision 20 and scale 2
            $table->double('tax', 20, 2)->default(0); // Double column for tax with default value 0
            $table->double('sub_total')->nullable(); // Nullable double column for sub_total
            $table->double('shipping_cost', 20, 2)->default(0); // Double column for shipping_cost with default value 0
            $table->integer('quantity')->nullable(); // Nullable integer column for quantity
            $table->string('payment_status', 10)->default('unpaid'); // String column for payment_status with default value 'unpaid'
            $table->string('delivery_status', 20)->nullable()->default('pending'); // Nullable string column for delivery_status with default value 'pending'
            $table->string('shipping_type')->nullable(); // Nullable string column for shipping_type
            $table->string('product_referral_code')->nullable(); // Nullable string column for product_referral_code
            $table->integer('sells_status')->default(0); // Integer column for sells_status with default value 0
            $table->timestamps(); // Laravel timestamp columns for created_at and updated_at 
            // $table->foreign('sell_id')->references('id')->on('sells')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sell_id')->constrained()->references('id')->on('sells')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('item_infos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sells_items', function (Blueprint $table) {
            Schema::dropIfExists('sells_items'); // Drop the sells_items table if the migration is rolled back
            $table->dropForeign(['sell_id']);
            $table->dropForeign(['product_id']);
        });
    }
};
