<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header class="header header-primary flex-sb centering">
    <img src="<?php echo get_template_directory_uri() . '/assets/images/nav-logo.png';?>" alt="logo" class="primary-logo">
    <nav class="nav nav-primary">
        <ul class="flex-sb">
            <li><a href="#events">Events</a></li>
            <li><a href="#about-us">About us</a></li>
            <li><a href="#partners">Our partners</a></li>
            <li><a href="#contacts">Contacts</a></li>
        </ul>
    </nav>
    <div class="header-btn-group flex-sb">
        <button class="btn-header host-event-btn">Host your event<?php include get_template_directory() . '/assets/images/svgs/top-right-corner-arrow.svg'; ?></button>
        <button class="btn-header login-btn">Log in</button>
        <button class="btn-header signup-btn">Sign up</button>
    </div>
    <img src="<?php echo get_template_directory_uri() . '/assets/images/svgs/burger-menu-closed.svg';?>" alt="burger-menu" class="burger-menu" tabindex="0">
</header>