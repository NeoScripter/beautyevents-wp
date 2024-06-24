<?php

// Load stylesheets
function load_css() {
    wp_enqueue_style( 'local-fonts', get_template_directory_uri() . '/assets/fonts/local-fonts.css', array(), null );
    wp_register_style('reset', get_template_directory_uri() . '/assets/css/reset.min.css', [], false, 'all');
    wp_enqueue_style('reset');
    wp_register_style('style', get_template_directory_uri() . '/assets/css/style.css', [], false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_css');

// Load JavaScript
function load_js() {
    wp_register_script('script.js', get_template_directory_uri() . '/assets/js/script.js', [], false, true);
    wp_enqueue_script('script.js');
}
add_action('wp_enqueue_scripts', 'load_js');

function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Custom image sizes
add_image_size('blog-large', 800, 600, true);
add_image_size('blog-small', 300, 200, true);

function add_custom_classes_to_paragraphs($content) {
    if (is_single() && has_category('event')) {
        // Split the content into paragraphs
        $paragraphs = explode('</p>', $content);

        // Loop through paragraphs and add classes
        foreach ($paragraphs as $index => $paragraph) {
            if (trim($paragraph)) {
                $paragraphs[$index] .= '</p>';
                // Add a custom class to each paragraph
                $paragraphs[$index] = str_replace('<p', '<p class="custom-paragraph-class-' . ($index + 1) . '"', $paragraphs[$index]);
            }
        }

        // Reconstruct the content with the modified paragraphs
        $content = implode('', $paragraphs);
    }

    return $content;
}

// Creating a menu

function remove_menu_container($args = '') {
    $args['container'] = false;
    return $args;
}
add_filter('wp_nav_menu_args', 'remove_menu_container');

function strip_ul_class($menu) {
    $menu = preg_replace('/<ul[^>]*>/', '', $menu);
    $menu = preg_replace('/<\/ul>/', '', $menu);
    $menu = preg_replace('/<li[^>]*>/', '', $menu);
    $menu = preg_replace('/<\/li>/', '', $menu);
    return $menu;
}
add_filter('wp_nav_menu', 'strip_ul_class');

function register_menus() {
    register_nav_menus(
        array(
            'top-menu' => __('Header Menu'),
            'privacy-menu' => __('Footer Menu'),
            'bottom-menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_menus');

function allow_html_in_menu_items($title, $item, $args, $depth) {
    return $item->post_title;
}
add_filter('nav_menu_item_title', 'allow_html_in_menu_items', 10, 4);

// Adding svgs

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

add_filter('the_content', 'add_custom_classes_to_paragraphs');
function add_event_post_type() {
    $args = [
        'labels' => [
            'name' => 'Events',
            'singular_name' => 'Event'
        ],
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'rewrite' => ['slug' => 'events']
    ];

    register_post_type('events', $args);
}
add_action('init', 'add_event_post_type');

function add_event_taxonomy() {
    $args = [
        'labels' => [
            'name' => 'Venues',
            'singular_name' => 'Venue'
        ],
        'public' => true,
        'hierarchical' => true,
    ];
    register_taxonomy('venues', ['events'], $args);
}
add_action('init', 'add_event_taxonomy');

// Hide the admin bar for all users except administrators
/* add_action('after_setup_theme', 'hide_admin_bar_for_non_admins');

function hide_admin_bar_for_non_admins() {
    if (!current_user_can('administrator')) {
        add_filter('show_admin_bar', '__return_false');
    }
} */

function render_events($count) {
    ob_start();
    for ($i = 0; $i < $count; $i++) {
        echo '<div class="event-wrapper">
            <div class="event-content">
                <img src="' . get_template_directory_uri() . '/assets/images/gallery-placeholder.png" alt="beauty event" class="event-img">
                <ul class="event-ul">
                    <li>online</li>
                    <li>offline</li>
                </ul>
                <h3 class="event-title">«THE BATTLE FOR RESPECT»</h3>
                <div class="event-desc">Join us for an exclusive beauty event focused on permanent makeup! Discover the latest techniques and trends, watch live demonstrations from top artists, and get all your questions answered. We\'re here to inspire and enhance your beauty! Entry by reservation only, limited spots available. Don\'t miss your chance to transform yourself!</div>
                <div class="event-flex-group">
                    <ul class="event-details">
                        <li class="event-date">28 MAY 2024</li>
                        <li class="event-time-zone">UTC: +03:00</li>
                        <li class="event-venue">Moscow, Russia</li>
                    </ul>
                    <a href="" class="event-join">Join</a>
                </div>
            </div>
        </div>';
    }
    return ob_get_clean();
}

function load_more_events() {
    $count = isset($_GET['count']) ? intval($_GET['count']) : 11;

    echo render_events($count);
    wp_die(); 
}

add_action('wp_ajax_load_more_events', 'load_more_events');
add_action('wp_ajax_nopriv_load_more_events', 'load_more_events');