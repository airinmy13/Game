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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->date('schedule_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('subject'); // Mata pelajaran (Matematika, Bahasa Inggris, dll)
            $table->string('mentor_name'); // Nama mentor/guru
            $table->string('location')->nullable(); // Lokasi les (online/offline)
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled');
            $table->text('notes')->nullable(); // Catatan dari mentor
            $table->boolean('attendance')->nullable(); // Kehadiran siswa (true=hadir, false=tidak hadir)
            $table->timestamps();
            
            // Index untuk query yang lebih cepat
            $table->index(['student_id', 'schedule_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
