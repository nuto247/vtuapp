/*
===========================================================================
 EXCLUSIVE ON themeforest.net
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 Template Name   : Softoi
 Author          : ThemePaa
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 Copyright (c) 2017 - 
===========================================================================
*/

(function($) {
    "use strict";
    var SOF = {};
    var plugin_track = 'static/plugin/';
    $.fn.exists = function() {
        return this.length > 0;
    };


    SOF.MenuClose = function() {
        $('.navbar-nav .nav-link').on('click', function() {
            var toggle = $('.navbar-toggler').is(':visible');
            if (toggle) {
                $('.navbar-collapse').collapse('hide');
            }
        });
    }


    /* ---------------------------------------------- /*
     * Header Fixed
    /* ---------------------------------------------- */
    SOF.HeaderFixd = function() {
        var HscrollTop = $(window).scrollTop();
        if (HscrollTop >= 100) {
            $('header').addClass('fixed-header');
        } else {
            $('header').addClass('fixed-header');
            //    $('header').removeClass('fixed-header');
        }
    }

    /*--------------------
        * One Page
    ----------------------*/
    SOF.OnePage = function() {
        $('header a[href*="#"]:not([href="#"]), .got-to a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 70,
                    }, 1000);
                    return false;
                }
            }
        });
    }


    /* ---------------------------------------------- /*
     * Mega Menu
    /* ---------------------------------------------- */




    /*--------------------
    * Counter JS
    ----------------------*/


    /*--------------------
    * OwlSlider
    ----------------------*/


    /* ---------------------------------------------- /*
     * lightbox gallery
    /* ---------------------------------------------- */


    /*--------------------
        * Tyoe It
    ----------------------*/
    SOF.VideoBG = function() {
        if ($(".video-bg").exists()) {
            loadScript(plugin_track + 'vide/jquery.vide.min.js', function() {});
        }
    }

    /*-----------------------
    * Working Contact form
    -------------------------*/




    /* ---------------------------------------------- /*
     * All Functions
    /* ---------------------------------------------- */
    // loadScript
    var _arr = {};

    function loadScript(scriptName, callback) {
        if (!_arr[scriptName]) {
            _arr[scriptName] = true;
            var body = document.getElementsByTagName('body')[0];
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = scriptName;
            // then bind the event to the callback function
            // there are several events for cross browser compatibility
            // script.onreadystatechange = callback;
            script.onload = callback;
            // fire the loading
            body.appendChild(script);
        } else if (callback) {
            callback();
        }
    };

    // Window on Load

    // Document on Ready
    $(document).on("ready", function() {
        SOF.VideoBG(),
            SOF.HeaderFixd(),
            SOF.OnePage(),

            SOF.MenuClose();



    });

    // Document on Scrool
    $(window).on("scroll", function() {
        SOF.HeaderFixd();
    });

    // Window on Resize
    $(window).on("resize", function() {});


})(jQuery);