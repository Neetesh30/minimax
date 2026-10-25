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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->nullable()->constrained('product_categories')->onDelete('set null');
            $table->foreignId('subsubcategory_id')->nullable()->constrained('product_categories')->nullOnDelete();
            $table->string('sku')->unique()->nullable();
            $table->string('product_code')->nullable();
            $table->string('capacity')->nullable();
            $table->date('expiry')->nullable();
            $table->longText('description')->nullable();
            $table->longText('html_table')->nullable();
            $table->longText('footer_description')->nullable();
            $table->boolean('status')->default(false);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('image')->nullable(); // primary image
            $table->json('images')->nullable(); // multiple images with checkboxes
            $table->json('selected_images')->nullable(); // to store selected images

            $table->json('application_areas')->nullable();
            $table->json('key_features')->nullable();
            $table->json('product_badges')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
