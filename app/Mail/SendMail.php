<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    protected $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template, $data)
    {
        $this->data = $data;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(isset($this->data['file'])){
            return $this->subject($this->data['subject'])
                ->view($this->template)
                ->attach($this->data['file'], $this->data['meta'])->with($this->data);
        } else {
            return $this->subject($this->data['subject'])
                ->view($this->template)->with($this->data);
        }
        // return $this->view($this->template)->with($this->data);
    }
}