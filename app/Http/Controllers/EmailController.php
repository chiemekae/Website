<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\JobEmail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function sendJobEmail(Request $request){
      $emailDetails = $request->all();
      $contractualJobEmail = new JobEmail($emailDetails["name"], $emailDetails["email"], $emailDetails["company"], $emailDetails["description"]);
      $contractualJobEmail->send();
      return null;
    }
}
