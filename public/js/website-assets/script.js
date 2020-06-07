"use strict";
// Animate loader off screen
$(window).load(function () {

    $(".loader").fadeOut("slow");
});

jQuery(document).ready(function () {

    // navbars
    var navbars = {
        // full screen side navbar
        sideNavBar: function () {
            $('.side-menu-button').on('click', function () {
                $('.sidenav').toggleClass("mySideBar");
                $(this).toggleClass("actives");
                $('.side-menu-button > i').toggleClass("fa-bars");
                $('.side-menu-button > i').toggleClass("fa-times");
            });
            $('.sidenav ul >li a').on('click', function () {
                $('.sidenav').removeClass("mySideBar");
                $('.side-menu-button').removeClass("actives");
                $('.side-menu-button > i').toggleClass("fa-bars");
                $('.side-menu-button > i').toggleClass("fa-times");
            });
        },
        //chainging navbar color on scroll
        navbarColor: function () {
            //scroll nav colors
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 70) { // Set position from top to add class
                    $('.navbar').addClass("shrink");
                    $('.yellow .navbar-brand> img').attr('src', 'images/kokro-yellow.png');
                    $('.green .navbar-brand> img').attr('src', 'images/green-dark.png');
                    $('.blue .navbar-brand> img').attr('src', 'images/blue-dark.png');
                    $('.red .navbar-brand> img').attr('src', 'images/red-dark.png');
                    $('.orange .navbar-brand> img').attr('src', 'images/orange-dark.png');


                }
                else {
                    $('.navbar').removeClass("shrink");
                    $('.yellow .navbar-brand> img').attr('src', 'images/kokro-yellow.png');
                    $('.green .navbar-brand> img').attr('src', 'images/green-white.png');
                    $('.blue .navbar-brand> img').attr('src', 'images/blue-white.png');
                    $('.red .navbar-brand> img').attr('src', 'images/red-white.png');
                    $('.orange .navbar-brand> img').attr('src', 'images/orange-white.png');

                }


            });
        },
        index2Navbar: function () {

            $('.index2 .navbar-toggle').on('click', function () {
                window.scrollTo(0, 72);
            });


        }
    };
    // calling navbars
    navbars.sideNavBar();
    navbars.navbarColor();
    navbars.index2Navbar();

    // Revolution Sliders
    var revolutionSliders = {
        //  animateSlider
        animateSlider: function () {
            var revap = $("#revo_slider").show().revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                scrollbarDrag: "true",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    //mouseScrollNavigation:"off",
                    //keyboardNavigation:"off",
                    arrows: {
                        enable: false
                    },
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable: 'true'
                    }
                },

                viewPort: {
                    enable: true,
                    outof: "pause",
                    visible_area: "80%"
                },
                responsiveLevels: [1170, 992, 767, 480],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 7000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    disable_onmobile: "on"
                },
                gridwidth: 1170,
                gridheight: 720,
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        },

        // simple and video slider1
        slider1: function () {
            jQuery("#slider1").revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                delay: 9000,
                navigation: {
                    bullets: {
                        enable: true,
                        direction: "vertical",
                        tmp: '<span class="tp-bullet-title">{{title}}</span>'
                    },
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                },

                gridwidth: 1230,
                gridheight: 720
            });
        },

        //tabs slider 
        tabSlider: function () {
            //  TABS Slider
            jQuery("#slider-tabs").revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                delay: 9000,
                navigation: {
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    tabs: {
                        style: "hesperiden",
                        enable: true,
                        width: 383,
                        height: 100,
                        min_width: 250,
                        wrapper_padding: 0,
                        wrapper_color: "",
                        wrapper_opacity: "1",
                        tmp: '<div class="tb-tab-content"><span class="tp-tab-number">{{param1}}</span><span class="tb-tab-title">{{title}}</span></div> <div class="tp-tab-desc">{{description}}</div>',
                        visibleAmount: 3,
                        hide_onmobile: true,
                        hide_under: 0,
                        hide_onleave: false,
                        hide_delay: 200,
                        direction: "horizontal",
                        span: true,
                        position: "inner",
                        space: 10,
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 0

                    }

                },

                gridwidth: 1170,
                gridheight: 720
            });
        },
        // Parallax revo_slider
        parallaxSlider: function () {
            // --------- Revolution Slider

            var revaps = $("#parallax_slider").show().revolution({
                sliderType: "standard",
                sliderLayout: "fullscreen",
                scrollbarDrag: "true",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    //mouseScrollNavigation:"off",
                    //keyboardNavigation:"off",
                    arrows: {
                        enable: false
                    },
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable: 'true'
                    }
                },

                viewPort: {
                    enable: true,
                    outof: "pause",
                    visible_area: "80%"
                },
                responsiveLevels: [1170, 992, 767, 480],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 7000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    disable_onmobile: "on"
                },
                gridwidth: 1170,
                gridheight: 720,
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                },
            });
        }
    };

    // calling revolution sliders
    revolutionSliders.animateSlider();
    revolutionSliders.slider1();
    revolutionSliders.tabSlider();
    revolutionSliders.parallaxSlider();

    // scrolling animation
    var scroll = {
      onClickScroll: function () {
          //scroll sections on clicking Links
          $(".scroll").on('click', function (event) {
              event.preventDefault();
              $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
          });
      },
        // mouse wheel scroll
       mouseWheelScroll: function () {
           if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
           window.onmousewheel = document.onmousewheel = wheel;

           function wheel(event) {
               var delta = 0;
               if (event.wheelDelta) delta = event.wheelDelta / 120;
               else if (event.detail) delta = -event.detail / 3;

               handle(delta);
               if (event.preventDefault) event.preventDefault();
               event.returnValue = false;
           }

           function handle(delta) {
               var time = 500;
               var distance = 500;

               $('html, body').stop().animate({
                   scrollTop: $(window).scrollTop() - (distance * delta)
               }, time );
           }
       }
    };
    // calling scrolling animation
    scroll.onClickScroll();
    //scroll.mouseWheelScroll();

    //responsive Tabs
    var tabs = "#responsiveTabsDemo";
    var responsiveTabs = {
        callTabs: function () {
            $(tabs).responsiveTabs({
                animation: 'slide'
            }, {'activate': '0'});
        }
    };
    responsiveTabs.callTabs();


    // our team image slider
    var ourTeamSlider = {
        sliderCall: function () {
            var imageSlider = ' #image-slider';
            $(imageSlider).owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 2,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [979, 1],
                navigation: true,
                navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                stopOnHover: true
            });
        }
    };
    //call our team slider
    ourTeamSlider.sliderCall();

    // Client Slide
    var clientSlider = {
        sliderCall: function () {
            $("#client-slider").owlCarousel({

                navigation: true, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                stopOnHover: true

                // "singleItem:true" is a shortcut for:
                // items : 1,
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false
            });
        }
    };
    //call client slider
    clientSlider.sliderCall();

    // progress bar funtion
    function progressBars() {
        var progressBar = $('.bottom-section .progress .progress-bar');
        progressBar.css({width: 0});
        progressBar.each(function () {
            $(this).animate({width: $(this).attr("aria-valuenow") + "%"}, 2000)
        });


    }

    // progress bar funtion call
    progressBars();


    var $portfolioTabs = {
        getAll: function () {
            var $load = $('#load');
            $('#stats').removeClass('bottom').addClass('top');
            $load.unbind();
            $load.text('Load More....');
            var $filter = $('.filter');
            $filter.hide('3000');
            $filter.each(function (index) {
                if (index === 2) {
                    return false;
                }
                $(this).addClass('even').show('3000');


            });


            $load.on('click', function () {
                $filter.addClass('even');
                $filter.show("3000");
                $(this).text("No More Element..");
            });
        },
        getItems: function () {
            var $getAll = this.getAll;
            $(".filter-button").click(function () {
                var value = $(this).attr('data-filter');
                var $filter = $('.filter');
                if (value === "all") {
                    $getAll();
                }
                else {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                    var $load = $('#load');
                    $load.unbind();
                    $load.text('Load More....');
                    $('#stats').removeClass('top').addClass('bottom');
                    $filter.not('.' + value).hide('3000');
                    $filter.removeClass('even');
                    $filter.filter('.' + value).each(function (index) {
                        if (index === 2) {
                            return false;
                        }
                        $(this).show("3000");

                    });
                    $load.on('click', function () {
                        $filter.filter('.' + value).show("3000");
                        $(this).text("No More Element..");
                    });

                }
            })
        },
        activeClass: function () {
            $(".filter-button").on('click', function () {
                if ($(".filter-button").hasClass('active')) {
                    $(".filter-button").removeClass('active');
                }
                $(this).toggleClass('active');
            })
        },
        fancybox: function () {
            $('.fancybox').fancybox();
        }
    };

    $portfolioTabs.getItems();
    $portfolioTabs.getAll();
    $portfolioTabs.activeClass();
    $portfolioTabs.fancybox();
    //wow .js


    if ($(window).width() > 767) {
        new WOW().init();

    }
    if ($(window).width() < 768) {
    $('.vertical-heading').find('br').hide();

    }else {
        $('.vertical-heading').find('br').show();
        $('.tabs-bg').css({"min-height": $("#responsiveTabsDemo").find('img').height() + "px"});
        $(window).on('resize',function () {
            $('.tabs-bg').css({"min-height": $("#responsiveTabsDemo").find('img').height() + "px"});
        });

    }


    if($(window).width() < 768){
        $('.tabs-bg').css({"min-height": "350px"});
        $(window).on('resize',function () {
            $('.tabs-bg').css({"min-height" : "350px"});
        });
    }
    /* map */
    if ($('#map').length) {
        //Contact Map
        var map;
        map = new GMaps({
            el: '#map'
            , lat: -12.043333
            , lng: -77.028333
            , scrollwheel: false,
            zoom: 18
        });
        map.drawOverlay({
            lat: map.getCenter().lat()
            ,
            lng: map.getCenter().lng()
            ,
            layer: 'overlayLayer'
            ,
            content: '<div class="overlay_map"><img src="images/markeryellow.png" alt="marker"></div>'
            ,
            verticalAlign: 'top'
            ,
            horizontalAlign: 'center'
        });
    }
    /* map end*/

//Contact Us
    $("#submit_btn").click(function() {
                //get input field values
                var user_name       = $('input[name=name]').val();
                var user_email      = $('input[name=email]').val();
                var user_telephone      = $('input[name=phone]').val();
                var user_subject      = $('input[name=subject]').val();
                var user_message    = $('textarea[name=message]').val();

                //simple validation at client's end
                var post_data, output;
                var proceed = true;
                if(user_name==""){
                        proceed = false;
                }
                if(user_email==""){
                        proceed = false;
                }
                if(user_message=="") {
                        proceed = false;
                }

                //everything looks good! proceed...
                if(proceed)
                {
                        //data to be sent to server
                        post_data = {'userName':user_name, 'userEmail':user_email, 'userTelephone':user_telephone, 'userSubject':user_subject, 'userMessage':user_message};

                        //Ajax post data to server
                        $.post('contact.php', post_data, function(response){

                                //load json data from server and output message
                if(response.type == 'error')
                {
                    output = '<div class="alert-danger" style="padding:10px; margin-bottom:25px;">'+response.text+'</div>';
                }else{
                    output = '<div class="alert-success" style="padding:10px; margin-bottom:25px;">'+response.text+'</div>';

                    //reset values in all input fields
                    $('#form-elements input').val('');
                    $('#form-elements textarea').val('');
                }

                $("#result").hide().html(output).slideDown();
                        }, 'json');

                }
        });

        //reset previously set border colors and hide all message on .keyup()
        $("#form-elements input, #form-elements textarea").keyup(function() {
                $("#result").slideUp();
        });



});
