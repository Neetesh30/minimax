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
        Schema::create('resource_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_category_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->string('title');
            $table->string('file'); // storage path
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_pdfs');
    }
};
