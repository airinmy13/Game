<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Only add created_by_teacher_id since subject and grade_level already exist
            $table->foreignId('created_by_teacher_id')->nullable()->after('grade_level')
                  ->constrained('teachers')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['created_by_teacher_id']);
            $table->dropColumn('created_by_teacher_id');
        });
    }
};
