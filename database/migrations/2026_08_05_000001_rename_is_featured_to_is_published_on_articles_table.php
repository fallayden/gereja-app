<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('is_featured', 'is_published');
        });

        // Articles with a publication date were publicly visible before this
        // flag existed, so keep them visible after adopting the new status.
        DB::table('articles')
            ->whereNotNull('published_at')
            ->update(['is_published' => true]);
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('is_published', 'is_featured');
        });
    }
};
