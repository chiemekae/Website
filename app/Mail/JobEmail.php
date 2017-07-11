<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $company;
    private $description;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $company, $description)
    {
        $this->name = $name;
        $this->email = $email;
        $this->company = $company;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = "Name: " . $name . "\n";
        $details .= "Email: " . $email . "\n";
        $details .= "Company: " . $company . "\n";
        $details .= "Project Description: " . $description . "\n";
        return $details;
    }

    /**
     * Send the message.
     *
     */
    public function send(){
      $emailText = $this->build();
      Mail::raw($emailText, function($message)
    	{
    		$message->subject('New Contractual Job!');
    		$message->from('mail@ekwunazu.com', 'Portfolio Mail');
    		$message->to('chiemeka@ekwunazu.com');
    	});
    }
}
