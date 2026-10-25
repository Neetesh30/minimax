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
        Schema::table('industries', function (Blueprint $table) {
             $table->string('slug')->unique();
             $table->longText('description')->nullable();
            $table->text('intro')->nullable();
            $table->json('key_risks')->nullable();
            $table->json('solutions')->nullable();
            $table->text('why_choose_us')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('industries', function (Blueprint $table) {
            $table->dropColumn(['slug', 'description','intro', 'key_risks', 'solutions', 'why_choose_us']);
        });
    }
};


