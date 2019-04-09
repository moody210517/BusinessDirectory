(function ($) {
    "use strict";
    /*------------------------------------------------------------------
    [Table of contents]

    [1] navigation
    [2] banner slider
    [3] about video
    [4] recent work tab
    [5] funfact
    [6] testmonial slider
    [7] testmonial slider v2
    [8] back to top
    [9] wow animatation
    [10] video popup
    [11] our project grid layout
    [12] gallery image popup
    [13] header search
    [14] about funfact
    [15] company timeline
    [16] testimonial slider
    [17] contact form init
    [18] preloader
    -------------------------------------------------------------------*/


    $(window).on('load', function () {
     /*==========================================================
             prelaoder
    ======================================================================*/
    $('#preloader').addClass('loaded');


    // preloader close
        $('.cancel-preloader').on('click', function (e) {
        e.preventDefault();
        if (!($('#preloader').hasClass('loaded'))) {
            $('#preloader').addClass('loaded');
        }
    })

    /*==========================================================
	our project grid layout
    ======================================================================*/


    if ($('.xs-portfolio-grid').length > 0) {
        var $portfolioGrid = $('.xs-portfolio-grid'),
            colWidth = function () {
                var w = $portfolioGrid.width(),
                    columnNum = 1,
                    columnWidth = 0;
                if (w > 1200) {
                    columnNum = 3;
                } else if (w > 900) {
                    columnNum = 3;
                } else if (w > 600) {
                    columnNum = 2;
                } else if (w > 450) {
                    columnNum = 2;
                } else if (w > 385) {
                    columnNum = 1;
                }
                columnWidth = Math.floor(w / columnNum);
                $portfolioGrid.find('.xs-portfolio-grid-item').each(function () {
                    var $item = $(this),
                        multiplier_w = $item.attr('class').match(/xs-portfolio-grid-item-w(\d)/),
                        multiplier_h = $item.attr('class').match(/xs-portfolio-grid-item-h(\d)/),
                        width = multiplier_w ? columnWidth * multiplier_w[1] : columnWidth,
                        height = multiplier_h ? columnWidth * multiplier_h[1] * 0.4 - 12 : columnWidth * 0.3;
                    $item.css({
                        width: width,
                        //height: height
                    });
                });
                return columnWidth;
            },
        
            isotope = function () {
                $portfolioGrid.isotope({
                    resizable: true,
                    itemSelector: '.xs-portfolio-grid-item',
                    masonry: {
                        columnWidth: colWidth(),
                        gutterWidth: 3
                    }
                });
            };
        isotope();
        $(window).resize(isotope);
    } // End is_exists

    // filter items on button click
    $('.filter').on('click', function () {
        var filterValue = $(this).attr('data-filter');
        $('.grid').isotope({ filter: filterValue });
        $('.filter').removeClass('active');
        $(this).addClass('active');
    });

    })

    /*==========================================================
				 email patern
    ======================================================================*/
    function email_pattern(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }


    /*==========================================================
      navigation
     ======================================================================*/
    if ($("#navigation1").length > 0) {
        $("#navigation1").navigation({
            effect: "slide"
        });
    }


    /*==========================================================
     banner slider
     ======================================================================*/
    if ($('.banner-slider').length > 0) {
        var bannerSlider = $(".banner-slider");
        bannerSlider.owlCarousel({
            items: 1,
            loop: true,
            mouseDrag: true,
            touchDrag: true,
            dots: false,
            nav: true,
            navText: ['<i class="icon icon-chevron-left"></i>', '<i class="icon icon-chevron-right"></i>'],
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            transitionStyle: "fade",
            smartSpeed: 800,
            responsive: {
                // breakpoint from 0 up
                0: {
                    nav: false,
                },
                // breakpoint from 480 up
                480: {
                    nav: false,
                },
                // breakpoint from 768 up
                991: {
                    nav: true,
                }
            }
        });
    }

    /*==========================================================
     about video
     ======================================================================*/
    $('.xs-video').magnificPopup({
        type: 'iframe',

    });

    /*==========================================================
     recent work
     ======================================================================*/
    $('#mixcontent').mixItUp({
        animation: {
            effects: 'fade translateX(50%)',
            reverseOut: true,
            duration: 1000
        },
        load: {
            filter: 'all'
        }
    });


    /*==========================================================
     funfact 
     ======================================================================*/
    var skl = true;
    $('.funfact-sec').appear();

    $('.funfact-sec').on('appear', function () {
        if (skl) {
            $('.funfact-title').each(function () {
                var $this = $(this);
                jQuery({ Counter: 0 }).animate({ Counter: $this.attr('data-counter') },
                    {
                        duration: 8000,
                        easing: 'swing',
                        step: function () {
                            var num = Math.ceil(this.Counter).toString();
                            if (Number(num) > 99999) {
                                while (/(\d+)(\d{3})/.test(num)) {
                                    num = num.replace(/(\d+)(\d{3})/, '');
                                }
                            }
                            $this.html(num);
                        }
                    });
            });
            skl = false;
        }
    });


    /*==========================================================
     testmonial slider
     ======================================================================*/
    if ($('#testmonial-slider').length > 0) {
        var bannerSlider = $("#testmonial-slider");
        bannerSlider.owlCarousel({
            items: 1,
            mouseDrag: true,
            touchDrag: true,
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800,
        });
    }

    /*==========================================================
     testmonial v2 slider
     ======================================================================*/
    if ($('#testmonial-slider-v2').length > 0) {
        var bannerSlider = $("#testmonial-slider-v2");
        bannerSlider.owlCarousel({
            items: 2,
            mouseDrag: true,
            touchDrag: true,
            dots: false,
            nav: true,
            margin: 30,
            navText: ['<i class="icon icon-arrow-left"></i>', '<i class="icon icon-arrow-right"></i>'],
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800,
            responsive: {
                // breakpoint from 0 up
                0: {
                    nav: true,
                    items: 1,
                },
                // breakpoint from 480 up
                480: {
                    nav: true,
                    items: 1,
                },
                // breakpoint from 768 up
                991: {
                    nav: true,

                }
            }
        });
    }



    /*==========================================================
     back to top
     ======================================================================*/
    $("body, html").on("click", ".BackTo", function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });

    /*==========================================================
    wow animated
     ======================================================================*/
    var wow = new WOW(
        {
            animateClass: 'animated',
            mobile: false
        }
    );
    wow.init();


    /*==========================================================
      video
     ======================================================================*/
    $('.video-play-btn').magnificPopup({
        type: 'iframe',

    });


    /*=============================================================
					image popup
	=========================================================================*/

    $('.xs-image-popup').magnificPopup({
        type: 'inline',
        closeOnContentClick: false,
        midClick: true,
        callbacks: {
            beforeOpen: function () {
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        zoom: {
            enabled: true,
            duration: 500, // don't foget to change the duration also in CSS
        },
        mainClass: 'mfp-fade',
    });

    /*==========================================================
        header search
        ======================================================================*/
    if ($('.search-icon').length > 0) {
        var todg = true;
        $(".search-icon").on("click", function (e) {
            e.preventDefault;
            $('.header-search-field').slideToggle('slow');
        });

        $(document).on('mouseup', function (e) {
            var container = $(".search-item");

            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $(".header-search-field").fadeOut("slow");
                todg = true;
            }

        });

    }

    /*==========================================================
       about funfact
    ======================================================================*/
    var skl = true;
    $('.about-inner-content').appear();

    $('.about-inner-content').on('appear', function () {
        if (skl) {
            $('.funfact-title').each(function () {
                var $this = $(this);
                jQuery({ Counter: 0 }).animate({ Counter: $this.attr('data-counter') },
                    {
                        duration: 8000,
                        easing: 'swing',
                        step: function () {
                            var num = Math.ceil(this.Counter).toString();
                            if (Number(num) > 99999) {
                                while (/(\d+)(\d{3})/.test(num)) {
                                    num = num.replace(/(\d+)(\d{3})/, '');
                                }
                            }
                            $this.html(num + "+");
                        }
                    });
            });
            skl = false;
        }
    });

    /*==========================================================
           company timeline
    ======================================================================*/
    if ($('.single-timeline-item .history-of-timeline').length > 0) {

        $('.single-timeline-item .history-of-timeline').on('click', function () {
            var show_detail = $(this).parents('.single-timeline-item');
            show_detail.addClass('active');
            var sibhide = $(this).parents('.single-timeline-item').siblings().removeClass('active');
            return false;
        });
    }


    /*==========================================================
    testmonial widget slider
    ======================================================================*/
    if ($('.testmonial-widget').length > 0) {
        var bannerSlider = $(".testmonial-widget");
        bannerSlider.owlCarousel({
            items: 1,
            mouseDrag: true,
            touchDrag: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800,
        });
    }



    /*==========================================================
    testmonial  slider v3
    ======================================================================*/
    if ($('#testmonial-slide').length > 0) {
        var bannerSlider = $("#testmonial-slide");
        bannerSlider.owlCarousel({
            items: 1,
            mouseDrag: true,
            touchDrag: true,
            dots: false,
            nav: true,
            autoplay: true,
            navText: ['<i class="icon icon-chevron-left"></i>', '<i class="icon icon-chevron-right"></i>'],
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800,
            responsive: {
                // breakpoint from 0 up
                0: {
                    nav: false,

                },
                // breakpoint from 480 up
                480: {
                    nav: false,

                },

                // breakpoint from 480 up
                768: {
                    nav: true,

                },
                // breakpoint from 768 up
                991: {
                    nav: true,

                }
            }
        });
    }

    /*==========================================================
    testmonial  slider v4
    ======================================================================*/
    if ($('#testmonial-slider-v4').length > 0) {
        var bannerSlider = $("#testmonial-slider-v4");
        bannerSlider.owlCarousel({
            items: 3,
            mouseDrag: true,
            margin: 30,
            touchDrag: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 800,
            responsive: {
                // breakpoint from 0 up
                0: {
                    nav: false,
                    items: 1,
                },
                // breakpoint from 480 up
                480: {
                    nav: false,
                    items: 1,
                },

                // breakpoint from 480 up
                768: {
                    nav: false,
                    items: 2,
                },
                // breakpoint from 768 up
                991: {
                    nav: false,

                }
            }
        });
    }
    /*==========================================================
                    contact form init
        ======================================================================*/

    $(document).on('submit', '#xs-contact-form', function (event) {
        event.preventDefault();
        /* Act on the event */

        var xs_contact_name = $('#xs_contact_name'),
            xs_contact_email = $('#xs_contact_email'),
            xs_contact_phone = $('#xs_contact_phone'),
            xs_contact_subject = $('#xs_contact_subject'),
            x_contact_massage = $('#x_contact_massage'),
            xs_contact_submit = $('#xs_contact_submit'),
            xs_contact_error = false;

        $('.xpeedStudio_success_message').remove();

        if (xs_contact_name.val().trim() === '') {
            xs_contact_name.addClass('invaild');
            xs_contact_error = true;
            xs_contact_name.focus();
            return false;
        } else {
            xs_contact_name.removeClass('invaild');
        }

        if (xs_contact_email.val().trim() === '') {
            xs_contact_email.addClass('invaild');
            xs_contact_error = true;
            xs_contact_email.focus();
            return false;
        } else if (!email_pattern(xs_contact_email.val().toLowerCase())) {
            xs_contact_email.addClass('invaild');
            xs_contact_error = true;
            xs_contact_email.focus();
            return false;
        } else {
            xs_contact_email.removeClass('invaild');
        }

        if (xs_contact_phone.val().trim() === '') {
            xs_contact_phone.addClass('invaild');
            xs_contact_error = true;
            xs_contact_phone.focus();
            return false;
        } else {
            xs_contact_phone.removeClass('invaild');
        }

        if (xs_contact_subject.val().trim() === '') {
            xs_contact_subject.addClass('invaild');
            xs_contact_error = true;
            xs_contact_subject.focus();
            return false;
        } else {
            xs_contact_subject.removeClass('invaild');
        }

        if (x_contact_massage.val().trim() === '') {
            x_contact_massage.addClass('invaild');
            xs_contact_error = true;
            x_contact_massage.focus();
            return false;
        } else {
            x_contact_massage.removeClass('invaild');
        }

        if (xs_contact_error === false) {
            xs_contact_submit.before().hide().fadeIn();
            $.ajax({
                type: "POST",
                url: "assets/php/contact-form.php",
                data: {
                    'xs_contact_name': xs_contact_name.val(),
                    'xs_contact_email': xs_contact_email.val(),
                    'xs_contact_phone': xs_contact_phone.val(),
                    'xs_contact_subject': xs_contact_subject.val(),
                    'x_contact_massage': x_contact_massage.val(),
                },
                success: function (result) {
                    xs_contact_submit.after('<p class="xpeedStudio_success_message">' + result + '</p>').hide().fadeIn();

                    setTimeout(() => {
                        $(".xpeedStudio_success_message").fadeOut(1000, function () {
                            $(this).remove();
                        });
                    }, 5000);

                    $('#xs-contact-form')[0].reset();
                }
            });
        }
    });


    /*==========================================================
     comment reply smooth scrolling
     ======================================================================*/
    if($('.comment-reply-link').length > 0){
        $('.comment-reply-link').on ('click',function () {
            $('html, body').animate({scrollTop: $(this.hash).offset().top -100}, 1000);
            return false;
        });
    }


})(jQuery);
