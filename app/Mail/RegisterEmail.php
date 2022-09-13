<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from('nskhiereli@gmail.com', 'CoronaTime')
		->subject('Account Confirmation')
		->markdown('emails.verify.account', ['url'=>$this->data['verification_code']]);
	}
}
