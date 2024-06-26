<footer class="footer-primary">
    <div class="footer-body">
        <div class="footer-flex-group-top">
            <nav class="footer-nav">
                <ul>
                    <li><img src="<?php echo get_template_directory_uri() . '/assets/images/footer-red-triangle.png'; ?>" alt="triangle" class="footer-nav-img"></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#about-us">About us</a></li>
                    <li><a href="#partners">our partners</a></li>
                    <li><a href="#contacts">contacts</a></li>
                </ul>
            </nav>
            <div class="footer-btn-group">
                <button class="btn-footer host-event-btn">Host your event<?php include get_template_directory() . '/assets/images/svgs/top-right-corner-arrow.svg'; ?></button>
                <button class="btn-footer host-event-btn">Become our partner<?php include get_template_directory() . '/assets/images/svgs/top-right-corner-arrow.svg'; ?></button>
            </div>
        </div>
        <div class="footer-flex-group-middle">
             <div class="footer-div-large">
                <h3>Reach out to us</h3>
                <p>and share details about your project.</p>
            </div>
            <div class="footer-margin-right">
                <h4>E-mail:</h4>
                <p>beautytd2022@gmail.com</p>
            </div>
             <div class="footer-svg-group">
                <a class="footer-svg-link" href="https://t.me/beauty_training_design"><?php include get_template_directory() . '/assets/images/svgs/telegram.svg'; ?></a>
                <a class="footer-svg-link insta" href="https://www.instagram.com/beauty4online?igsh=MW53bW96djlmam9pZQ=="><?php include get_template_directory() . '/assets/images/svgs/insta.svg'; ?></a>
                <a class="footer-svg-link" href="https://www.facebook.com/profile.php?id=100088276970688&mibextid=LQQJ4d"><?php include get_template_directory() . '/assets/images/svgs/fb.svg'; ?></a>
                <a class="footer-svg-link" href="https://pin.it/2xZ05rpes"><?php include get_template_directory() . '/assets/images/svgs/pininterest.svg'; ?></a>
            </div>
        </div>
        <div class="footer-flex-group-bottom">
            <div class="expanded-footer-div">
                <p>©2024 Next Beauty Events &copy;</p>
                <p>ALL RIGHTS RESERVED</p>
            </div>
            <?php wp_nav_menu(array(
                'theme_location' => 'bottom-menu',
                'items_wrap' => '%3$s',
            ));?>
            <a href="#banner">BACK TO TOP</a>
        </div>
    </div>
</footer>

<?php wp_footer();?>
</body>
</html>