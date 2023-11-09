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

                var thisForm = $(this);

                // use ajax http request
                $.ajax({

                    url: thisForm.attr("action"),
                    type: "POST",
                    data: thisForm.serialize(),
                    dataType: 'json',
                    beforeSend: function(responses) {

                        // show ajax loader before complete php logic
                        common.ajaxLoader(true, thisForm, true);
                    },
                    success: function(responses) {

                        if(responses.success) {

                            // login success, reload page
                            location.reload();
                        }
                        else {

                            // error handling
                            thisForm.find("#validation-login-submit").text(responses.message);
                            thisForm.find("#validation-login-submit").show();
                        }
                    },
                    error: function(responses) {

                        // error handling
                        thisForm.find("#validation-login-submit").text("Login Fail: Something wrong.");
                        thisForm.find("#validation-login-submit").show();
                    },
                    complete: function() {

                        // hide ajax loader when complete php logic
                        common.ajaxLoader(false, thisForm, true);
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

        _form: $(".add-to-cart-form"),

        init: function() {

            product.animation();

            product.slider();

            product.addToCart();
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

        addToCart: function() {

            // login form submit
            product._form.submit(function(e) {

                var thisForm = $(this);

                // prepare add to cart success message
                var options = {
                    "title": "Add to Cart Success",
                    "content": thisForm.find("input[name=product_name]").val() + " was added!",
                    "trigger": "manual",
                    "placement": "bottom"
                };

                thisForm.find("button[type=submit]").popover(options);

                // use ajax http request
                $.ajax({

                    url: thisForm.attr("action"),
                    type: "POST",
                    data: thisForm.serialize(),
                    dataType: 'json',
                    beforeSend: function(responses) {

                        // show ajax loader before complete php logic
                        common.ajaxLoader(true, thisForm);
                    },
                    success: function(responses) {

                        if(responses.success) {

                            // show add to cart success message
                            thisForm.find("button[type=submit]").popover("show");

                            // update the total qty of cart on nav bar
                            $(".nav-cart").find(".badge").text(responses.message);
                        }
                        else {

                            // if customer not login yet
                            if(responses.code == "require-login") {

                                // pop up the login form
                                $("#login-modal").modal('show');
                            }

                            // error handling
                            thisForm.find(".validation-add-to-cart").text(responses.message);
                            thisForm.find(".validation-add-to-cart").show();
                        }
                    },
                    error: function(responses) {

                        // error handling
                        thisForm.find(".validation-add-to-cart").text("Add to Cart Fail: Something wrong.");
                        thisForm.find(".validation-add-to-cart").show();
                    },
                    complete: function() {

                        // hide ajax loader when complete php logic
                        common.ajaxLoader(false, thisForm);
                    }
                });
            });
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

        ajaxLoader: function(showLoader, element, reset = false) {

            if(showLoader) {

                element.find(".ajax-loader").show();
                element.find("button[type=submit]").prop("disabled", true);

                if(reset) {

                    element.find("button[type=reset]").prop("disabled", true);
                }
            }
            else {

                element.find(".ajax-loader").hide();
                element.find("button[type=submit]").prop("disabled", false);

                if(reset) {

                    element.find("button[type=reset]").prop("disabled", false);
                }
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