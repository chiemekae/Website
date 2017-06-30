<!doctype html>
<html>
<head>
  <title>Chiemeka Ekwunazu | Creative Web Developer and Designer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" type="text/css">
  <!-- Bootstrap JS-->
  <script src="<?php echo asset('js/app.js'); ?>"></script>
  <!-- Typed.js-->
  <script src="<?php echo asset('js/typed.js'); ?>"></script>
</head>
<body>
  <nav class="navbar fixed-top navbar-inverse bg-black">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img id="logo" src="<?php echo asset('images/logo.png'); ?>" height="40px" width="40px" class="d-inline-block align-top" alt="">
        <div>
          <div id="chiemeka">Chiemeka Ekwunazu</div><br>
          Creative Web Developer
        </div>
      </a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="hamburger-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Who Am I</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact Me</a></li>
      </ul>
    </div>
  </nav>
  <div id="greeting-container">
      <img id="bobby" src="<?php echo asset('images/sky-bobby.png'); ?>" height="10%"/>
      <img id="home" src="<?php echo asset('images/skyimage.jpg'); ?>" width="100%"/>
      <p id="hi">Hi, I'm Chiemeka (Bobby) Ekwunazu,<br><br>Your Next:</p>
      <div id="typed-strings">
          <p>Full Stack Web Developer.</p>
          <p>Web Designer.</p>
          <p>Wordpress Developer.</p>
      </div>
      <script>
        //Adjust the height of the background image according to its width (Width of screen)
        $('#home').css("height", (1680/$("#home").width())*($("#home").width()/2.1));
        //Adjust Bobby's height according to the height of the background image
        $('#bobby').css("height", 0.35*$("#home").height());
        //Place Bobby just above the edge of the background image
        $('#bobby').css("top",$("#home").height()-$("#bobby").height());
        //Typed.js
      	document.addEventListener("DOMContentLoaded", function(){
      		Typed.new("#typed", {
      			stringsElement: document.getElementById('typed-strings'),
      			typeSpeed: 0,
            showCursor:false,
            loop: true
      		});
      	});
      </script>
      <span id="typed"></span>
      <script>
        //Adjust Typed.js placement according to the height of the background image
        $('#typed').css("top", 400*(800/$("#home").height()));
      </script>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <p id="synopsis">I am a student at the University of Maryland, College Park as well as a freelance web designer and full stack and Wordpress web developer.<br>I am currently seeking web development internship offers and contractual remote design or development positions.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="need-button-div">
          <button type="button" class="btn-default need-button">I need a website</button>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="need-button-div">
          <button type="button" class="btn-default need-button">I need an intern</button>
        </div>
      </div>
    </div>
    <div class="row">
      <p class="title">What I've worked on</p>
    </div>
  </div>
</body>
</html>
