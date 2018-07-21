<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSent extends Mailable
{
    use Queueable, SerializesModels;

    public $input;
    public $affiliateUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input = [])
    {
        $this->input = $input;

        $affiliate_id = (isset($_COOKIE['affiliate_id']) && $_COOKIE['affiliate_id']) ? $_COOKIE['affiliate_id'] : '';
        if ($affiliate_id) {
          $affiliate_id = explode(':', hex2bin($affiliate_id), 2)[0];

          $this->affiliateUser = \App\User::where('id', $affiliate_id)->first();
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(config('custom.primary_email'));
        $this->view('emails.contact-us')->with([
          'input' => $this->input,
          'affiliateUser' => $this->affiliateUser,
        ]);

        return $this;
    }
}
