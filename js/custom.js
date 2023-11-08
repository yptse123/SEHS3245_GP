(function($) {

    // Login Form / Logout
    var login = {

        _form: $("#login-form"),

        init: function() {

            login.presetLogin();

            login.login();
        },

        presetLogin: function() {

            // present the login information
            login._form.find("#login-email").val("customer01@sleipnir.com");

            login._form.find("#login-password").val("password");
        },

        login: function() {

            // login form submit
            login._form.submit(function(e) {

                // use ajax http request
                $.ajax({

                    url: login._form.attr("action"),
                    type: "POST",
                    data: login._form.serialize(),
                    dataType: 'json',
                    beforeSend: function(responses) {

                        // show ajax loader before complete php logic
                        common.ajaxLoader(true);
                    },
                    success: function(responses) {

                        if(responses.success) {

                            // // hide login modal
                            // $("#login-modal").modal("hide");

                            // // replace "Account" to customer email
                            // $(".dropdown-account").find(".label-customer-email").html(responses.message);

                            // // show logout button, hide login button
                            // $(".dropdown-account").find(".li-btn-login").hide();
                            // $(".dropdown-account").find(".li-btn-logout").show();

                            location.reload();
                        }
                        else {

                            // error handling
                            login._form.find("#validation-login-submit").val(responses.message);
                            login._form.find("#validation-login-submit").show();    
                        }
                    },
                    error: function(responses) {

                        // error handling
                        login._form.find("#validation-login-submit").val("Login Fail: Something wrong.");
                        login._form.find("#validation-login-submit").show();
                    },
                    complete: function() {

                        // hide ajax loader when complete php logic
                        common.ajaxLoader(false);
                    }
                });
            });
        },

    };

    if($("#login-modal").length > 0) {

		login.init();
	}

    // Product Page
    var product = {

        init: function() {

            product.animation();

            product.slider();
        },

        animation: function() {

            // title fade in
            $(".page-header").animate({

                opacity: 1, 
                marginLeft: '0',
            });

            // scroll to
            $(".btn-more-container").find(".btn").click(function() {

                common.scrollSlowly(document.getElementById("section-product-info").offsetTop, 500);
            });
        },

        slider: function() {

            $(".product-slider").owlCarousel({

                loop: true,
                margin: 0,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive:{
                    0:{
                        items: 1
                    },
                    600:{
                        items: 1
                    },
                    1000:{
                        items: 1
                    }
                }
            })
        },
    };

    if($(".product-page").length > 0) {

        product.init();
    }

    var common = {

        fixNav: function() {

            $(window).scroll(function(){
                var nav = $("nav.navbar"),
                scroll = $(window).scrollTop();

                if (scroll >= 100) {

                    nav.addClass("fixed");
                    $(".btn-scroll-to-top").show();
                }
                else {

                    nav.removeClass("fixed");
                    $(".btn-scroll-to-top").hide();
                }
            });
        },

        scrollToTop: function() {

            $(".btn-scroll-to-top").click(function() {

                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
        },

        ajaxLoader: function(showLoader) {

            if(showLoader) {

                $(".ajax-loader").show();
                $("button[type=submit]").hide();
                $("button[type=reset]").hide();
            }
            else {

                $(".ajax-loader").hide();
                $("button[type=submit]").show();
                $("button[type=reset]").show();
            }
        },

        scrollSlowly: function(position, durationTime) 
        {
            // current position
            var currentPosition = window.pageYOffset;
            // start time
            var startTime = null;
            // duration time
            if(durationTime == null) durationTime = 500;
            // to position
            position = +position, durationTime = +durationTime;

            window.requestAnimationFrame(function step(currentTime) 
            {
                startTime = !startTime ? currentTime : startTime;
                var progressTime = currentTime - startTime;

                if (currentPosition < position) 
                {
                    window.scrollTo(0, ((position - currentPosition) * progressTime / durationTime) + currentPosition);
                } 
                else 
                {
                    window.scrollTo(0, currentPosition - ((currentPosition - position) * progressTime / durationTime));
                }

                if (progressTime < durationTime) 
                {
                    window.requestAnimationFrame(step);
                } 
                else 
                {
                    window.scrollTo(0, position);
                }
            });
        },
    }

    if($("nav.navbar").length > 0) {

        common.fixNav();
    }

    if($(".btn-scroll-to-top").length > 0) {

        common.scrollToTop();
    }

})(jQuery);