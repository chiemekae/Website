require('./bootstrap');


//Link scrolling and selection

//Move to section of webpage clicked with Smoothscroll
$(document).ready(function () {
    onScroll();
    $(document).on("scroll", onScroll);

    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        //Change active link
        if($(this).hasClass("nav-link")){
          $('a').each(function () {
              $(this).parent().removeClass('active');
          });
          $(this).parent().addClass('active');
        }

        //Scroll to section of webpage
        if(!$(this).hasClass("modal-link")){
          var target = this.hash,
              menu = target;
          $target = $(target);
          $('html, body').stop().animate({
              'scrollTop': $target.offset().top-50
          }, 500, 'swing', function () {
              window.location.hash = target;
              $(document).on("scroll", onScroll);
          });
        }

        //Toggle nav menu if visible
        if($('#hamburger-menu').attr("aria-expanded") == "true"){
          $('.navbar-toggle').click();
        }
    });
    //Show background color when hamburger menu is clicked
    $('.navbar-toggle ').on('click', function (e) {
      $('.navbar').addClass("navbar-dark");
    });
});

function onScroll(event){
    var scrollPos = $(document).scrollTop()+50;
    //Change indicated link on navbar on scroll
    $('.nav a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        var currLi = currLink.parent();
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.nav ul li').removeClass("active");
            currLi.addClass("active");
        }
        else{
            currLi.removeClass("active");
        }
    });
    /*
      Change background of navbar once past the background image at the top
      or if hamburger menu is open.
    */
    var transitionHeight = $('.background-image-container').height() - $('.navbar').height();
    if(scrollPos > transitionHeight || $('#hamburger-menu').attr("aria-expanded") == "true"){
        $('.navbar').addClass("navbar-dark");
    }else{
        $('.navbar').removeClass("navbar-dark");
    }
}
