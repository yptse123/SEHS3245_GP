    <section class="newsletter-container">
        <div class="newsletter-title">
            Latest Trends & Promotions. Are you on the list?
        </div>
        <div class="newsletter-form-container">
            <form id="newsletter-form" method="POST" class="form-inline" action="ajax/newsletter_subscribe.php" onsubmit="return false;">
                <div class="form-group">
                    <label class="sr-only" for="newsletter-email">Email address</label>
                    <input type="email" class="form-control" id="newsletter-email" placeholder="Email" required />
                    <button type="submit" class="btn btn-default dark">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span> 
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
        <div class="newsletter-description">
            Subscribe our newsletter and get the deals !
        </div>
    </section>
    
    <footer>
        <div class="copyright col-sm-10">© <?php echo date("Y")?> Sleipnir. All Rights Reserved.</div>
        <div class="col-sm-2">
            <div class="col-sm-4 social-icon"><img class="icon" src="images/twitter.png" /></div>
            <div class="col-sm-4 social-icon"><img class="icon" src="images/facebook.png" /></div>
            <div class="col-sm-4 social-icon"><img class="icon" src="images/instagram.png" /></div>
        </div>
    </footer>