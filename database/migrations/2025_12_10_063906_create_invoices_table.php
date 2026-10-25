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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
             $table->string('invoice_number', 255)->nullable();
            $table->string('invoice_date', 20)->nullable();
            $table->string('customer_account', 255);
            $table->string('customer', 255)->nullable();
            $table->string('delivery_city', 255)->nullable();
            $table->string('pin_code', 255)->nullable();
            $table->string('product', 500)->nullable();
            $table->string('code', 255)->nullable();
            $table->string('batch_no', 15)->nullable();
            $table->string('sr_no', 15)->nullable();
            $table->text('CCOM_IS_FOR_CUSTOMER')->nullable();
            $table->text('CDOM_IS_FOR_DEALER')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
