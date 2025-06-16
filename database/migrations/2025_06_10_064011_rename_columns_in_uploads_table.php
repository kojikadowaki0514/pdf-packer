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
        Schema::table('uploads', function (Blueprint $table) {
            $table->renameColumn('file_name', 'original_filename')->change(); // 変更前 → 変更後
            $table->renameColumn('stored_name', 'saved_filename')->change();   // 変更前 → 変更後
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('uploads', function (Blueprint $table) {
            $table->renameColumn('original_filename', 'file_name')->change();
            $table->renameColumn('saved_filename', 'stored_name')->change();
        });
    }
};
