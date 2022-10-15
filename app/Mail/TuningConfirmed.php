<?php

namespace App\Mail;

use App\Models\Tuning;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TuningConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tuning $tuning)
    {
        $this->tuning = $tuning;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.tunings.confirmed')
            ->with([ 'tuning' => $this->tuning ]);
    }
}
