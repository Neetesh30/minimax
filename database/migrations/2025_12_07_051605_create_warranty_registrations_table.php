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
        Schema::create('warranty_registrations', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['customer', 'dealer']);
            $table->string('organisation_name');
            $table->string('gunnebo_invoice_no')->nullable();
            $table->string('dealer_invoice_no')->nullable();
            $table->string('end_customer_name')->nullable();
            $table->string('batch_no');
            $table->string('serial_from');
            $table->string('serial_to');
            $table->string('mobile');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranty_registrations');
    }
};
