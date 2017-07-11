
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});*/



//Navbar scrolling and selection

//Move to section of webpage clicked with Smoothscroll
$(document).ready(function () {
    onScroll();
    $(document).on("scroll", onScroll);

    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        //Change active link
        $('a').each(function () {
            $(this).parent().removeClass('active');
        })
        $(this).parent().addClass('active');

        //Scroll to section of webpage
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });

        //Toggle nav menu if visible
        if($('.navbar-toggle').css('display') !='none'){
          $('.navbar-toggle').click();
        }
    });
    //Show background color when hamburger menu is cliced
    $('.navbar-toggle ').on('click', function (e) {
      $('.navbar').addClass("navbar-dark");
    });
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
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
    //Change background of navbar once past the background image at the top
    var transitionHeight = $('.background-image-container').height() - $('.navbar').height();
    if(scrollPos > transitionHeight){
        $('.navbar').addClass("navbar-dark");
    }else{
        $('.navbar').removeClass("navbar-dark");
    }
}
