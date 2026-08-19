<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->renameColumn('edition', 'edition_number');
            $table->renameColumn('cover_path', 'cover_image');
            $table->renameColumn('file_path', 'pdf_file');
        });

        Schema::table('magazines', function (Blueprint $table) {
            $table->date('publish_date')->nullable()->index();
        });

        DB::table('magazines')
            ->select(['id', 'year', 'month'])
            ->orderBy('id')
            ->each(function (object $magazine): void {
                $month = max(1, min(12, (int) ($magazine->month ?: 1)));

                DB::table('magazines')
                    ->where('id', $magazine->id)
                    ->update([
                        'publish_date' => sprintf('%04d-%02d-01', $magazine->year, $month),
                    ]);
            });

        Schema::table('magazines', function (Blueprint $table) {
            $table->dropIndex(['year']);
            $table->dropColumn(['year', 'month']);
        });
    }

    public function down(): void
    {
        Schema::table('magazines', function (Blueprint $table) {
            $table->unsignedSmallInteger('year')->nullable()->index();
            $table->unsignedTinyInteger('month')->nullable();
        });

        DB::table('magazines')
            ->select(['id', 'publish_date'])
            ->whereNotNull('publish_date')
            ->orderBy('id')
            ->each(function (object $magazine): void {
                DB::table('magazines')
                    ->where('id', $magazine->id)
                    ->update([
                        'year' => (int) substr($magazine->publish_date, 0, 4),
                        'month' => (int) substr($magazine->publish_date, 5, 2),
                    ]);
            });

        Schema::table('magazines', function (Blueprint $table) {
            $table->dropIndex(['publish_date']);
            $table->dropColumn('publish_date');
        });

        Schema::table('magazines', function (Blueprint $table) {
            $table->renameColumn('edition_number', 'edition');
            $table->renameColumn('cover_image', 'cover_path');
            $table->renameColumn('pdf_file', 'file_path');
        });
    }
};
