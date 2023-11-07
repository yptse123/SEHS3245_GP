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

    var common = {

        ajaxLoader: function(showLoader) {

            if(showLoader) {

                $('.ajax-loader').show();
                $('button[type=submit]').hide();
                $('button[type=reset]').hide();
            }
            else {

                $('.ajax-loader').hide();
                $('button[type=submit]').show();
                $('button[type=reset]').show();
            }
        },
    }

})(jQuery);