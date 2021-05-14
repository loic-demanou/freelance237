<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidatedProposalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_job_post;
    public $job_post_title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_job_post, $job_post_title)
    {
        $this->user_job_post = $user_job_post;
        $this->job_post_title=$job_post_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your proposal has been validated')
        ->view('mails.validated_proposal');
    }
}
