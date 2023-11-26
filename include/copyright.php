    <section class="newsletter-container text-center">
        <div class="newsletter-title">
            Latest Trends & Promotions. Are you on the list?
        </div>
        <div class="newsletter-form-container">
            <form id="newsletter-form" method="POST" class="form-inline" action="action/subscribe_newsletter.php" onsubmit="return false;">
                <div class="form-group">
                    <label class="sr-only" for="newsletter-email">Email address</label>
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" pattern="([A-Za-z0-9][._]?)+[A-Za-z0-9]@[A-Za-z0-9]+(\.?[A-Za-z0-9]){2}\.(com?|net|org)+(\.[A-Za-z0-9]{2,4})?" placeholder="name@domain.com" required />
                    <button type="submit" class="btn btn-default dark">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span> 
                        Subscribe
                    </button>
                </div>
                <div id="validation-newsletter-submit" class="invalid-feedback">
                    Subscribe Newsletter: Something wrong.
                </div>
                <div class="newsletter-description">
                    Subscribe our newsletter and get the deals !
                </div>
                <div id="complete-newsletter-submit"></div>
            </form>
        </div>
    </section>
    
    <footer>
        <div class="copyright col-sm-10 text-center">© <?php echo date("Y")?> Sleipnir. All Rights Reserved.</div>
        <div class="col-sm-2">
            <div class="col-sm-4 social-icon text-center">
                <a target="_blank" src="https://twitter.com/">
                    <img class="icon" src="images/twitter.png" />
                </a>
            </div>
            <div class="col-sm-4 social-icon text-center">
                <a target="_blank" src="https://www.facebook.com/">
                    <img class="icon" src="images/facebook.png" />
                </a>
            </div>
            <div class="col-sm-4 social-icon text-center">
                <a target="_blank" src="https://www.instagram.com/">
                    <img class="icon" src="images/instagram.png" />
                </a>
            </div>
        </div>
    </footer>