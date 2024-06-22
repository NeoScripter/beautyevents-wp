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
                    <div><img src="<?php echo get_template_directory_uri() . '/assets/images/svgs/telegram.svg';?>" alt="Telegram logo"></div>
                    <div><img src="<?php echo get_template_directory_uri() . '/assets/images/svgs/insta.svg';?>" alt="Instagram logo"></div>
                    <div><img src="<?php echo get_template_directory_uri() . '/assets/images/svgs/fb.svg';?>" alt="Facebook logo"></div>
                    <div><img src="<?php echo get_template_directory_uri() . '/assets/images/svgs/pininterest.svg';?>" alt="Pininterest logo"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="banner">

    </div>
</div>


<?php get_footer(); ?>
