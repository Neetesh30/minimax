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
        Schema::table('products', function (Blueprint $table) {
             $table->json('application_areas')->nullable()->after('description');
            $table->json('key_features')->nullable()->after('application_areas');
            $table->json('product_badges')->nullable()->after('key_features');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
             $table->dropColumn([
                'application_areas',
                'key_features',
                'product_badges',
            ]);
        });
    }
};
