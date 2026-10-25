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
        // Existing installations may already contain some of these columns.
        $existingColumns = Schema::getColumnListing('industries');

        Schema::table('industries', function (Blueprint $table) use ($existingColumns) {
            if (! in_array('slug', $existingColumns, true)) {
                $table->string('slug')->unique();
            }
            if (! in_array('description', $existingColumns, true)) {
                $table->longText('description')->nullable();
            }
            if (! in_array('intro', $existingColumns, true)) {
                $table->text('intro')->nullable();
            }
            if (! in_array('key_risks', $existingColumns, true)) {
                $table->json('key_risks')->nullable();
            }
            if (! in_array('solutions', $existingColumns, true)) {
                $table->json('solutions')->nullable();
            }
            if (! in_array('why_choose_us', $existingColumns, true)) {
                $table->text('why_choose_us')->nullable();
            }
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


