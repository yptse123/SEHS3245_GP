    <section class="newsletter-container">
        <div class="newsletter-title">
            Latest Trends & Promotions. Are you on the list?
        </div>
        <div class="newsletter-form-container">
            <form id="newsletter-form" method="POST" class="form-inline" action="ajax/newsletter_subscribe.php" onsubmit="return false;">
                <div class="form-group">
                    <label class="sr-only" for="newsletter-email">Email address</label>
                    <input type="email" class="form-control" id="newsletter-email" placeholder="Email" required />
                    <button type="submit" class="btn btn-default">Subscribe</button>
                </div>
            </form>
        </div>
        <div class="newsletter-description">
            Subscribe our newsletter and get the deals !
        </div>
    </section>
    
    <footer>
        <div class="copyright">© <?php echo date("Y")?> Sleipnir. All Rights Reserved.</div>
    </footer>