<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--
Tinker Template 
http://www.templatemo.com/tm-506-tinker
-->
        <title>Sistem Absensi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
               
        <link rel="apple-touch-icon" href="{{url('assets')}}/apple-touch-icon.png">

        <link rel="stylesheet" href="{{url('assets')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/fontAwesome.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/hero-slider.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/owl-carousel.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/templatemo-style.css">
        <link rel="stylesheet" href="{{url('assets')}}/css/lightbox.css">

        <script src="{{url('assets')}}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>
    <div id="app">
   <dog></dog>   
     </div>
     @yield('main')
<script src="./js/app.js"></script>

    <script>window.jQuery || document.write('<script src="{{url('assets')}}/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="{{url('assets')}}/js/vendor/bootstrap.min.js"></script>

    <script src="{{url('assets')}}/js/plugins.js"></script>
    <script src="{{url('assets')}}/js/main.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 50;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>

    </body>
    </html>