    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" class="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="login-modal">Hi <?php if(isset($_SESSION["customer_email"])) echo $_SESSION["customer_email"] ?>, Please Login Your Account</h4>
                </div>
                <div class="modal-body">
                    <form action="action/login_account.php" method="POST" id="login-form" class="form-horizontal" onsubmit="return false;">
                        <div class="form-group">
                            <label for="login-email" class="col-sm-4 control-label">Login Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="login-email" name="login_email" pattern="([A-Za-z0-9][._]?)+[A-Za-z0-9]@[A-Za-z0-9]+(\.?[A-Za-z0-9]){2}\.(com?|net|org)+(\.[A-Za-z0-9]{2,4})?" placeholder="name@domain.com" required />
                            </div>
                            <div id="validation-login-email" class="invalid-feedback col-sm-offset-4">
                                Please input vaild login email
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login-password" class="col-sm-4 control-label">Login Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="login-password" name="login_password" required />
                            </div>
                            <div id="validation-login-password" class="invalid-feedback col-sm-offset-4">
                                Please input vaild login password
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-default btn-login">Sign in</button>
                                <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                <button type="reset" class="btn btn-default btn-reset">Clear</button>
                            </div>
                            <div id="validation-login-submit" class="invalid-feedback col-sm-offset-4">
                                Login Fail: Something wrong.
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Slider JS -->
    <script src="js/owl.carousel.min.js"></script>

    <!-- Custom JS -->
    <script src="js/custom.js"></script>