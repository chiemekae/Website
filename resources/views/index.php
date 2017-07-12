<!doctype html>
<html>
<head>
  <title>Chiemeka Ekwunazu | Creative Web Developer and Designer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" type="text/css">
  <!-- JS-->
  <script src="<?php echo asset('js/app.js'); ?>"></script>
  <!-- Typed.js-->
  <script src="<?php echo asset('js/typed.js'); ?>"></script>
  <!-- AngularJS-->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</head>
<body>
  <nav class="navbar fixed-top navbar-inverse bg-black">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img class="logo" src="/images/logo.png" height="40px" width="40px" class="d-inline-block align-top" alt="">
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
        <li class="active"><a href="#home">Who Am I</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact Me</a></li>
      </ul>
    </div>
  </nav>
  <div style="overflow: hidden">
    <!-- Who Am I -->
    <div id="home">
      <div class="background-image-container">
          <img class="bobby" src="/images/sky-bobby.png" height="10%"/>
          <img class="background-image" src="images/skyimage.jpg" width="100%"/>
          <p class="intro">Hi, I'm Chiemeka (Bobby) Ekwunazu,<br><br>Your Next:</p>
          <div class="typed-strings">
              <p>Full Stack Web Developer.</p>
              <p>Web Designer.</p>
              <p>Wordpress Developer.</p>
          </div>
          <script>
            //Adjust the height of the background image according to its width (Width of screen)
            $('.background-image').css("height", (1680/$(".background-image").width())*($(".background-image").width()/2.1));
            //Adjust Bobby's height according to the height of the background image
            $('.bobby').css("height", 0.35*$(".background-image").height());
            //Place Bobby just above the edge of the background image
            $('.bobby').css("top",$(".background-image").height()-$(".bobby").height());

            //Typed.js
          	document.addEventListener("DOMContentLoaded", function(){
          		Typed.new("#typed", {
          			stringsElement: document.getElementsByClassName('typed-strings')[0],
          			typeSpeed: 0,
                showCursor:false,
                loop: true
          		});
          	});
          </script>
          <span id="typed"></span>
          <script>
            //Adjust Typed.js placement according to the height of the background image
            $('#typed').css("top", 400*(800/$(".background-image").height()));
          </script>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p class="center-text" style="margin-top: 50px;">I am a student at the University of Maryland, College Park as well as a freelance web designer and full stack and Wordpress web developer.<br>I am currently seeking web development internship offers and contractual remote design or development positions.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="centered-button-div">
              <a href="#contractual"><button type="button" class="btn-default">I need a website</button></a>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="centered-button-div">
              <a href="#internship"><button type="button" class="btn-default">I need an intern</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project Images -->
    <div class="container" id="projects">
      <div class="row">
        <div class="col-sm-12">
          <p class="title">What I've worked on</p>
        </div>
      </div>
      <?php
        $projects = DB::select('select * from projects', [1]);

        //If there's an even number of projects, show more examples title at top
        $count = count($projects);
        if($count % 2 == 0){
          echo '<p class="center-text">
                  Want to see more examples? <a href="mailto:chiemeka@ekwunazu.com?Subject=Example%20work">Email me!</a>
                </p>';
        }

        $oddProject = true;

        //Get each website from database and display its first picture in a Bootstrap grid
        foreach ($projects as $project) {
          //Checks if its an odd numbered project and if so, creates a new row for the project
          if ($oddProject) {
            echo '<div class="row">';
          }
          //If its not this website, show the picture for the website
          if($project->imgstring != "ekwunazu"){
            echo '<div class="col-sm-5 desciption-container">
                    <img class="project-image" src="images/projects/'.$project->imgstring.'-1.png" alt="'.$project->imgstring.'"/>
                    <div class="description">
                      <p>'.$project->name.'<br>'.$project->description.'</p>
                    </div>
                  </div>';
          }
          //If it is this website, show the window for this website
          else {
            echo '<div class="col-sm-5 desciption-container no-background-image" style="background-color: #00BD9C">
                    <div class="projects-div-title"><p>This Website!</p></div>
                    <img class="project-image invisible-image" src="" alt="ekwunazu"/>
                    <div class="description">
                      <p>'.$project->name.'<br>'.$project->description.'</p>
                    </div>
                  </div>';
          }

          //Checks if its an even numbered project and if so, closes row
          if (!$oddProject) {
            echo '</div>';
          }

          $oddProject = !$oddProject;
        }

        //If there's an odd number of projects, show more examples box
        if ($count % 2 == 1){
          echo '<div class="col-sm-5 no-background-image" style="background-color: #2A2A2A">
                  <div class="projects-div-title">
                    <a href="mailto:chiemeka@ekwunazu.com?Subject=Example%20work">
                      <p>Want to see more examples?<br>Email me!</p>
                    </a>
                  </div>
                </div>
                </div>';
        }
       ?>
     </div>

    <script>
       //Resize windows according to height of other images with jQuery
       var resizeProjectImage = function (newHeight){
         $(".no-background-image").css("height", newHeight);
       };
       $(window).bind('load', function(){
         resizeProjectImage($(".project-image").height());
       });
       $(window).resize(function(){
         resizeProjectImage($(".project-image").height());
       });

       var imageInterval = null;

       //Event handling for description window when project is hovered over
       $( ".desciption-container" ).hover(function () {
         //Fade in animation
         jQuery(".description", this)
          .slideDown()
          .animate(
            { opacity: 1 },
            { queue: false}
          );
          var backgroundImage = jQuery(".project-image", this);
          var imageIndex = 2;

          //Hide project image title if it's there
          if(jQuery(".projects-div-title", this)){
            jQuery(".projects-div-title", this).css("display", "none");
          }

          //Set changing project image interval
          imageInterval = setInterval(function () {
            backgroundImage.attr("src", "images/projects/"+backgroundImage.attr("alt")+"-"+imageIndex+".png");
            //Make project image visible if invisible
            backgroundImage.css("display", "inline");
            imageIndex++;
            if (imageIndex == 4) {
              imageIndex = 1;
            }
          }, "2000");
        },
        // When the project is no longer hovered over
        function () {
          clearInterval(imageInterval);
          //Reset project image to original
          var backgroundImage = jQuery(".project-image", this);

          //If its a window without a background image, hide image and show title
          if (backgroundImage.hasClass('invisible-image')){
            backgroundImage.attr("src", "");
            backgroundImage.css("display", "none");
            jQuery(".projects-div-title", this).css("display", "table-cell");
          }
          else{
            // If it has a background image, change back to the original
            backgroundImage.attr("src", "images/projects/"+backgroundImage.attr("alt")+"-1.png");
          }
          //Fade out animation
          jQuery(".description", this)
           .slideUp()
           .animate(
             { opacity: 0 },
             { queue: false}
           );
         }
       );
    </script>

    <!-- Contact -->
    <div class="container" id="contact">
     <div class="row">
       <div class="col-sm-12">
         <p class="title">Let's build something together!</p>
       </div>
     </div>
     <!-- Internships -->
     <div id="internship">
       <div class="row">
         <div class="col-sm-12">
           <p class="center-text secondary-title">Internships</p>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <p class="center-text">If your company has an open position for a web development intern, feel free to contact me at my email, chiemeka@ekwunazu.com. I am avaliable during the summer and winter months in the Baltimore area.</p>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <div class="centered-button-div">
             <a href="mailto:chiemeka@ekwunazu.com">
               <button type="button" class="btn-default">Email me</button>
             </a>
           </div>
         </div>
       </div>
     </div>
     <!-- Contractual jobs -->
     <div id="contractual">
       <div class="row">
         <div class="col-sm-12">
           <p class="center-text secondary-title">Contractual Job</p>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <p class="center-text">Need a website? Fill out the form below and I’ll get in touch!</p>
         </div>
       </div>
       <form class="form">
         <div class="row">
           <div class="col-sm-12">
             <input id="contractual-name" class="contractual-input" type="text" placeholder="Write your name here.."></input>
           </div>
         </div>
         <div class="row">
           <div class="col-sm-12">
             <input id="contractual-email" class="contractual-input" type="text" placeholder="Let me know what email to contact you back at.."></input>
           </div>
         </div>
         <div class="row">
           <div class="col-sm-12">
             <input id="contractual-company" class="contractual-input" type="text" placeholder="Let me know the name of your company if applicable.."></input>
           </div>
         </div>
         <div class="row">
           <div class="col-sm-12">
             <textarea id="contractual-description" class="contractual-textarea" placeholder="Tell me about your project!" required></textarea><br>
           </div>
         </div>
         <div class="row">
           <div class="col-sm-12">
             <button type="button" onclick="submitContractual()" class="btn-default">Send</button>
           </div>
         </div>
         <div id="" class="form-sent row">
           <div class="col-sm-12">
             <p class="center-text">Form Sent!</p>
           </div>
         </div>
       </form>
     </div>
     <script>
       function submitContractual() {
         var submitData = {
           "name" : document.getElementById("contractual-name").value,
           "email" : document.getElementById("contractual-email").value,
           "company" : document.getElementById("contractual-company").value,
           "description" : document.getElementById("contractual-description").value
         };
         $.ajax({
           async: false,
           url: "/submitjob",
           type: "post",
           data: submitData,
           success: function (response) {
             $(".form-sent").css("display", "inline");
           },
           error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
           }
         });
       }
     </script>
    </div>
    <!-- Links -->
    <div>
    </div>
   </div>
  </body>
</html>
