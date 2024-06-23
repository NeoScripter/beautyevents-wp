<?php get_header(); ?>
<body>
<div class="popup-menu-overlay">
    <div class="popup-menu">
        <div class="popup-menu__logo-wrapper">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/nav-logo.png';?>" alt="logo" class="logo-small">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/svgs/burger-menu-open.svg';?>" alt="burger-menu" class="close-burger-menu">
        </div>
        <nav class="nav nav-secondary">
            <ul class="flex-sb">
                <li><a href="#">Events</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Our partners</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </nav>
        <div class="popup-menu__btn-wrapper">
            <div class="flex-sb">
                <button class="btn-header login-btn">Log in</button>
                <button class="btn-header signup-btn">Sign up</button>
            </div>
            <button class="btn-header host-event-btn">Host your event</button>
        </div>
        <div>
            <div class="popup-menu-bottom">
                <div>
                    <h3>Reach out to us</h3>
                    <p>and share details about your project.</p>
                </div>
                <div>
                    <h4>E-mail:</h4>
                    <p>beautytd2022@gmail.com</p>
                </div>
                <div class="flex-sb svg-group">
                    <a class="header-svg-link" href=""><?php include get_template_directory() . '/assets/images/svgs/telegram.svg'; ?></a>
                    <a class="header-svg-link insta" href=""><?php include get_template_directory() . '/assets/images/svgs/insta.svg'; ?></a>
                    <a class="header-svg-link" href=""><?php include get_template_directory() . '/assets/images/svgs/fb.svg'; ?></a>
                    <a class="header-svg-link" href=""><?php include get_template_directory() . '/assets/images/svgs/pininterest.svg'; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="banner">
        <div class="banner-content">
            <h1 class="main-heading"><span class="main-heading-span-large">ALL UPCOMING</span><br>BEAUTY <span class="pink-font-color">EVENTS</span></h1>
            <div class="cookie-policy">
                <p>This website uses cookies. Find out more in the "About Cookies" section, including how to opt-out.</p>
                <button class="accept-cookies-btn">Accept all cookies</button>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
