<?php
  use App\Mail\JobEmail;

  if(isset($_POST["name"])
    && isset($_POST["email"])
    && isset($_POST["company"])
    && isset($_POST["description"]){
    $contractualJobEmail = new JobEmail($_POST["name"], $_POST["email"], $_POST["company"], $_POST["description"]);
    $contractualJobEmail.send();
  }
 ?>

