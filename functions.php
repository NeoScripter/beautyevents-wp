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
