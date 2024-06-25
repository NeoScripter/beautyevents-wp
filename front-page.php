<?php get_header(); ?>
<div class="popup-menu-overlay">
    <div class="popup-menu">
        <div class="popup-menu__logo-wrapper">
            <img src="<?php echo get_template_directory_uri() .
                "/assets/images/nav-logo.png"; ?>" alt="logo" class="logo-small">
            <img src="<?php echo get_template_directory_uri() .
                "/assets/images/svgs/burger-menu-open.svg"; ?>" alt="burger-menu" class="close-burger-menu">
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
            <button class="btn-header host-event-btn">Host your event <?php include get_template_directory() .
                "/assets/images/svgs/top-right-corner-arrow.svg"; ?></button>
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
                    <a class="header-svg-link" href=""><?php include get_template_directory() .
                        "/assets/images/svgs/telegram.svg"; ?></a>
                    <a class="header-svg-link insta" href=""><?php include get_template_directory() .
                        "/assets/images/svgs/insta.svg"; ?></a>
                    <a class="header-svg-link" href=""><?php include get_template_directory() .
                        "/assets/images/svgs/fb.svg"; ?></a>
                    <a class="header-svg-link" href=""><?php include get_template_directory() .
                        "/assets/images/svgs/pininterest.svg"; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper" id="banner">
    <div class="banner">
        <div class="banner-content">
            <h1 class="main-heading"><span class="main-heading-span-large">ALL UPCOMING</span><br>BEAUTY <span class="pink-font-color">EVENTS</span></h1>
            <div class="cookie-policy">
                <p>This website uses cookies. Find out more in the 
                <?php wp_nav_menu([
                    "theme_location" => "top-menu",
                    "items_wrap" => '%3$s',
                ]); ?> section, including how to opt-out.</p>
                <button class="accept-cookies-btn">Accept all cookies</button>
            </div>
        </div>
    </div>
</div>
<main class="main centering">
    <section class="event-list">
        <form method="get" action="<?php echo esc_url(
            home_url("/")
        ); ?>" class="event-filter-form">
            <?php include get_template_directory() .
                "/includes/filter-content.php"; ?>
        </form>
        <?php $initial_count = 3; ?>
        <div class="event-grid-group">
            <?php echo render_events($initial_count); ?>
        </div>
        <button id="see-more-button" data-count="<?php echo $initial_count; ?>">See More <?php include get_template_directory() .
    "/assets/images/svgs/top-right-corner-arrow.svg"; ?></button>
    </section>

        <?php
        $ad_img_left = get_field("ad_img_left");
        $ad_img_right = get_field("ad_img_right");
        ?>

    <section class="ads">
        <h2 class="ads-heading">Access events hosted <span class="ads-grey">by industry experts</span> <img src="<?php echo get_template_directory_uri() .
            "/assets/images/ad-img.png"; ?>" alt="A glass ramekin on white background with orange powder inside it with a brush soaked into it" class="ad-img"> enhance your knowledge and skills!</h2>
        <div class="ads-grid-group">
            <div class="ad-img-wrapper">
                <img class="ad-img-bottom" 
                    src="<?php echo esc_url($ad_img_left["url"]); ?>" 
                    alt="<?php echo esc_attr(get_post_meta($ad_img_left["ID"], "_wp_attachment_image_alt", true)); ?>">
                <a href="" class="more-details-link">More details</a>
            </div>
            <div class="ad-img-wrapper">
                <img class="ad-img-bottom" 
                    src="<?php echo esc_url($ad_img_right["url"]); ?>" 
                    alt="<?php echo esc_attr(get_post_meta($ad_img_right["ID"], "_wp_attachment_image_alt", true)); ?>">
                <a href="" class="more-details-link">More details</a>
            </div>
        </div>
        <h3 class="ads-small-heading">Beauty. collaborative excellence.</h3>
        <h2 class="ads-heading flex-sb">Broaden your network
            <div class="arrow-holder flex-sb">
                <div class="carousel-arrow prev"><?php include get_template_directory() . "/assets/images/svgs/carousel-arrow-left.svg"; ?></div>
                <div class="carousel-arrow next"><?php include get_template_directory() . "/assets/images/svgs/carousel-arrow-right.svg"; ?></div>
            </div>
        </h2>
        <?php
        $ad_img_left = get_field("ad_img_left");
        $ad_img_right = get_field("ad_img_right");
        ?>
        <div class="carousel-wrapper">
            <div class="carousel-track-container">
                <ul class="carousel-track">
                <?php 
            if( have_rows('partner_ads') ): 
                while( have_rows('partner_ads') ): the_row(); 
                    $image = get_sub_field('image');
                    $link = get_sub_field('link'); 
            ?>
            <li class="carousel-slide">
                <a href="<?php echo esc_url($link); ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="464">
                </a>
            </li>
            <?php 
                endwhile; 
            else:
                echo '<li>No partner ads found.</li>'; // Optional: to handle cases with no ads
            endif;
            ?>
                </ul>
            </div>
        </div>
    </section>


</main>


<?php get_footer(); ?>
