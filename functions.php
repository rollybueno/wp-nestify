<?php
/**
 * Nestify functions and definitions
 *
 * @package Nestify
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define theme version
define( 'NESTIFY_VERSION', '1.0.0' );

/**
 * Enqueue Google Fonts
 */
function nestify_enqueue_google_fonts() {
    wp_enqueue_style(
        'nestify-google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Merriweather:wght@400;600;700&family=Source+Code+Pro:wght@400;500&display=swap',
        array(),
        NESTIFY_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'nestify_enqueue_google_fonts' );

/**
 * Register block patterns
 */
function nestify_register_block_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        // Register patterns directory
        register_block_pattern(
            'nestify/hero',
            array(
                'title'       => __( 'Hero Section', 'nestify' ),
                'description' => _x( 'A hero section with heading, description and call to action button.', 'Block pattern description', 'nestify' ),
                'content'     => file_get_contents( get_template_directory() . '/patterns/hero.html' ),
            )
        );

        register_block_pattern(
            'nestify/features',
            array(
                'title'       => __( 'Features Grid', 'nestify' ),
                'description' => _x( 'A three-column grid showcasing features or services.', 'Block pattern description', 'nestify' ),
                'content'     => file_get_contents( get_template_directory() . '/patterns/features.html' ),
            )
        );
    }
}
add_action( 'init', 'nestify_register_block_patterns' );

/**
 * Register block pattern categories
 */
function nestify_register_block_pattern_categories() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
            'nestify',
            array( 'label' => __( 'Nestify', 'nestify' ) )
        );
    }
}
add_action( 'init', 'nestify_register_block_pattern_categories' );

/**
 * Add theme support
 */
function nestify_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Add support for full and wide align images
    add_theme_support( 'align-wide' );

    // Add support for custom line height controls
    add_theme_support( 'custom-line-height' );

    // Add support for experimental link color control
    add_theme_support( 'experimental-link-color' );

    // Add support for custom units
    add_theme_support( 'custom-units' );
}
add_action( 'after_setup_theme', 'nestify_setup' ); 