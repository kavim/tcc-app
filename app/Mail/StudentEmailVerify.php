<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentEmailVerify extends Mailable
{
    use Queueable, SerializesModels;

    protected Student $student;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->student->academic_institution_email)
            ->from('suporte@probi.com', 'Probi')
            ->subject('Verify email')
            ->markdown('emails.student_email_verify', [
                'email_verify_token' => $this->student->email_verify_token
            ]);
    }
}
