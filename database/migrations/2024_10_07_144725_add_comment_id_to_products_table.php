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
            $table->foreignId('comment_id')->nullable()->constrained('comments'); // Yangi ustun qo'shildi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['comment_id']); // Chet el kaliti o'chiriladi
            $table->dropColumn('comment_id');    // Ustun o'chiriladi
        });
    }
};
