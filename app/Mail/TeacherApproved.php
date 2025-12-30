<?php

namespace App\Mail;

use App\Models\Teacher;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeacherApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function build()
    {
        return $this->subject('Selamat! Akun Guru Anda Telah Diaktifkan')
                    ->view('emails.teacher-approved');
    }
}
