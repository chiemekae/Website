<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function sendJobEmail(Request $request){
      $emailDetails = $request->all();
      $details = "Name: " . $emailDetails["name"] . "\n";
      $details .= "Email: " . $emailDetails["email"] . "\n";
      $details .= "Company: " . $emailDetails["company"] . "\n";
      $details .= "Project Description: " . $emailDetails["description"] . "\n";
      Mail::raw($details, function($message)
    	{
    		$message->subject('New Contractual Job!');
    		$message->from('mail@ekwunazu.com', 'Portfolio Mail');
    		$message->to('chiemeka@ekwunazu.com');
    	});
    }
}
