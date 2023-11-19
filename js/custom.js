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
                        thisForm.find("#validation-login-submit").hide();
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

                common.scrollSlowly(document.getElementById("section-product-info").offsetTop - 100, 500);
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

            // add to cart form submit
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
                        thisForm.find(".validation-add-to-cart").hide();
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

    // Cart Page
    var cart = {

        _removeForm: $(".remove-item-form"),
        _couponForm: $("#cart-coupon-form"),
        _updateForm: $("#update-cart-form"),
        _orderForm: $("#place-order-form"),

        init: function() {

            cart.animation();

            cart.removeItem();

            cart.applyCoupon();

            cart.adjustQty();

            cart.updateCart();

            cart.placeOrder();
        },

        animation: function() {

            // title fade in
            $(".page-header").animate({

                opacity: 1, 
                marginLeft: '0',
            });

            // scroll to
            $(".btn-checkout").click(function() {

                common.scrollSlowly(document.getElementById("checkout-section").offsetTop - 100, 500);
            });
        },

        removeItem: function() {

            // remove item form submit
            cart._removeForm.submit(function(e) {

                var thisForm = $(this);

                // prepare remove item confirm message
                var message = "Are you sure to remove this item ?";

                if (confirm(message) == true) {

                    // use ajax http request
                    $.ajax({

                        url: thisForm.attr("action"),
                        type: "POST",
                        data: thisForm.serialize(),
                        dataType: 'json',
                        beforeSend: function(responses) {

                            // show ajax loader before complete php logic
                            common.ajaxLoader(true, thisForm);
                            thisForm.find(".validation-remove-item").hide();
                        },
                        success: function(responses) {

                            if(responses.success) {

                                if(responses.message > 0) {

                                    // success
                                    thisForm.parent().parent().fadeOut("slow");

                                    // update the total qty of cart on nav bar
                                    $(".nav-cart").find(".badge").text(responses.message);

                                    // show remove item success alert
                                    $(".alert-success").text(responses.product + " was removed").fadeIn("slow");
                                }
                                else {

                                    // total qty empty, referesh the page
                                    location.reload();  
                                }
                            }
                            else {

                                // error handling
                                thisForm.find(".validation-remove-item").text(responses.message);
                                thisForm.find(".validation-remove-item").show();
                            }
                        },
                        error: function(responses) {

                            // error handling
                            thisForm.find(".validation-remove-item").text("Add to Cart Fail: Something wrong.");
                            thisForm.find(".validation-remove-item").show();
                        },
                        complete: function() {

                            // hide ajax loader when complete php logic
                            common.ajaxLoader(false, thisForm);
                        }
                    });
                }
            });
        },

        applyCoupon: function() {

            // remove item form submit
            cart._couponForm.submit(function(e) {

                var thisForm = $(this);

                // use ajax http request
                $.ajax({

                    url: thisForm.attr("action"),
                    type: "POST",
                    data: thisForm.serialize(),
                    dataType: 'json',
                    beforeSend: function(responses) {

                        // show ajax loader before complete php logic
                        common.ajaxLoader(true, thisForm);
                        thisForm.find("#validation-cart-coupon-submit").hide();
                    },
                    success: function(responses) {

                        if(responses.success) {

                            // update the total qty of cart on nav bar
                            $(".nav-cart").find(".badge").text(responses.message.total_qty);

                            // update cart total table
                            $(".cart-total-table").find(".subtotal").text(common.toCurrency(responses.message.subtotal));
                            $(".cart-total-table").find(".discount").text(common.toCurrency(responses.message.discount));
                            $(".cart-total-table").find(".grand-total").text(common.toCurrency(responses.message.grand_total));

                            // show remove item success alert
                            $(".alert-success").text("Coupon was applied!").fadeIn("slow");
                        }
                        else {

                            // error handling
                            thisForm.find("#validation-cart-coupon-submit").text(responses.message);
                            thisForm.find("#validation-cart-coupon-submit").show();
                        }
                    },
                    error: function(responses) {

                        // error handling
                        thisForm.find("#validation-cart-coupon-submit").text("Apply Coupon Fail: Something wrong.");
                        thisForm.find("#validation-cart-coupon-submit").show();
                    },
                    complete: function() {

                        // hide ajax loader when complete php logic
                        common.ajaxLoader(false, thisForm);
                    }
                });
            });
        },

        adjustQty: function() {

            $(".cart-table").find(".qty-inc").click(function() {

                var itemPrice = parseFloat($(this).parent().parent().find(".item-price-row").text().replace(/,/g, ""));
                var oldQty = parseInt($(this).parent().find(".update-item-qty").val());
                var newQty = oldQty + 1;
                var newSubtotal = itemPrice * newQty;

                $(this).parent().find(".update-item-qty").val(newQty);
                $(this).parent().find(".item-qty").text(newQty);
                $(this).parent().parent().find(".item-subtotal-row").text(common.toCurrency(newSubtotal));
            });

            $(".cart-table").find(".qty-dec").click(function() {

                var itemPrice = parseFloat($(this).parent().parent().find(".item-price-row").text().replace(/,/g, ""));
                var oldQty = parseInt($(this).parent().find(".update-item-qty").val());
                var minQty = parseInt($(this).parent().find(".update-item-qty").attr("min"));
                var newQty = oldQty - 1;

                if(newQty <= minQty) {
                    newQty = minQty;
                }

                var newSubtotal = itemPrice * newQty;

                $(this).parent().find(".update-item-qty").val(newQty);
                $(this).parent().find(".item-qty").text(newQty);
                $(this).parent().parent().find(".item-subtotal-row").text(common.toCurrency(newSubtotal));
            });
        },

        updateCart: function() {

            // update cart form submit
            cart._updateForm.submit(function(e) {

                var thisForm = $(this);

                // prepare update cart success message
                var options = {
                    "title": "Update Cart Success",
                    "content": "Update Cart Success!",
                    "trigger": "manual",
                    "placement": "right"
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
                        thisForm.find("#validation-update-cart-submit").hide();
                    },
                    success: function(responses) {

                        if(responses.success) {

                            // update the total qty of cart on nav bar
                            $(".nav-cart").find(".badge").text(responses.message.total_qty);

                            // update cart total table
                            $(".cart-total-table").find(".subtotal").text(common.toCurrency(responses.message.subtotal));
                            $(".cart-total-table").find(".discount").text(common.toCurrency(responses.message.discount));
                            $(".cart-total-table").find(".grand-total").text(common.toCurrency(responses.message.grand_total));

                            // show update success alert
                            $(".alert-success").text("Cart was updated successfully!").fadeIn("slow");
                            thisForm.find("button[type=submit]").popover("show");
                        }
                        else {

                            // error handling
                            thisForm.find("#validation-update-cart-submit").text(responses.message);
                            thisForm.find("#validation-update-cart-submit").show();
                        }
                    },
                    error: function(responses) {

                        // error handling
                        thisForm.find("#validation-update-cart-submit").text("Update Cart Fail: Something wrong.");
                        thisForm.find("#validation-update-cart-submit").show();
                    },
                    complete: function() {

                        // hide ajax loader when complete php logic
                        common.ajaxLoader(false, thisForm);
                    }
                });
            });
        },

        placeOrder: function() {

            // go next step
            $(".btn-next").click(function () {

                $("#checkout-payment").find("a").trigger("click");
            });

            // update cart form submit
            cart._orderForm.submit(function(e) {

                var thisForm = $(this);

                // use ajax http request
                $.ajax({

                    url: thisForm.attr("action"),
                    type: "POST",
                    data: thisForm.serialize(),
                    dataType: 'json',
                    beforeSend: function(responses) {

                        // show ajax loader before complete php logic
                        common.ajaxLoader(true, thisForm);
                        thisForm.find("#validation-place-order-submit").hide();
                    },
                    success: function(responses) {

                        if(responses.success) {

                            if(responses.message == "success") {
                                window.location.href = "success.php";
                            }
                        }
                        else {

                            // error handling
                            thisForm.find("#validation-place-order-submit").text(responses.message);
                            thisForm.find("#validation-place-order-submit").show();
                        }
                    },
                    error: function(responses) {

                        // error handling
                        thisForm.find("#validation-place-order-submit").text("Place Order Fail: Something wrong.");
                        thisForm.find("#validation-place-order-submit").show();
                    },
                    complete: function() {

                        // hide ajax loader when complete php logic
                        common.ajaxLoader(false, thisForm);
                    }
                });
            });
        },
    };

    if($(".cart-page").length > 0) {

        cart.init();
    }

    // Success Page
    var success = {

        init: function() {

            success.animation();
        },

        animation: function() {

            // title fade in
            $(".page-header").animate({

                opacity: 1, 
                marginLeft: '0',
            });
        },
    };

    if($(".success-page").length > 0) {

        success.init();
    }

    // Home Page
    var home = {

        init: function() {

            home.animation();

            home.slider();
        },

        animation: function() {

            // title fade in
            $(".page-header").animate({

                opacity: 1, 
                marginLeft: '0',
            });
        },

        slider: function() {

            $(".home-slider").owlCarousel({

                loop: true,
                margin: 0,
                nav: false,
                dots: true,
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

    if($(".home-page").length > 0) {

        home.init();
    }

    var common = {

        _newletterForm: $("#newsletter-form"),

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

        scrollSlowly: function(position, durationTime) {
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
        
        subscribeNewsletter: function() {

            // subscribe newsletter form submit
            common._newletterForm.submit(function(e) {

                var thisForm = $(this);

                // prepare subscribe newsletter success message
                var options = {
                    "title": "Subscribe Newsletter Success",
                    "content": "Subscribe Newsletter Success!",
                    "trigger": "manual",
                    "placement": "right"
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
                        thisForm.find("#validation-newsletter-submit").hide();
                    },
                    success: function(responses) {

                        if(responses.success) {

                            // show add to cart success message
                            thisForm.find("button[type=submit]").popover("show");

                            // show sub count
                            var respText = responses.message + " people Subscribed";
                            thisForm.find("#complete-newsletter-submit").text(respText);
                            thisForm.find("#complete-newsletter-submit").show();
                        }
                        else {

                            // error handling
                            thisForm.find("#validation-newsletter-submit").text(responses.message);
                            thisForm.find("#validation-newsletter-submit").show();
                        }
                    },
                    error: function(responses) {

                        // error handling
                        thisForm.find("#validation-newsletter-submit").text("Subscribe Newsletter Fail: Something wrong.");
                        thisForm.find("#validation-newsletter-submit").show();
                    },
                    complete: function() {

                        // hide ajax loader when complete php logic
                        common.ajaxLoader(false, thisForm);
                    }
                });
            });
        },

        toCurrency: function(value) {

            return value.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        },
    }

    if($("nav.navbar").length > 0) {

        common.fixNav();
    }

    if($(".btn-scroll-to-top").length > 0) {

        common.scrollToTop();
    }

    if($("#newsletter-form").length > 0) {

        common.subscribeNewsletter();
    }

})(jQuery);