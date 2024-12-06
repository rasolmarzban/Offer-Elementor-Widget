<?php

/**
 * Plugin Name: Offer Widget 
 * Description: Custom Elementor widget offer for WooCommerce product.
 * Version: 1.0
 * Author: Rasolmarzban
 * Email: RasolMarzban@outlook.com
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register the Elementor widget
function register_elementor_woocommerce_offer_product_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/class-offer-widget.php');
    define('WPOFF_PATH', plugin_dir_path(__FILE__));
    define('WPOFF_URL', plugin_dir_url(__FILE__));
    $widgets_manager->register(new \Elementor\WooCommerce_Offer_Products_Widget());
}
add_action('elementor/widgets/register', 'register_elementor_woocommerce_offer_product_widget');

// Enqueue any necessary scripts and styles for your widget
function enqueue_elementor_offer_widget_scripts()
{
    // Enqueue CSS files

    if (!wp_style_is('bootstrap', 'enqueued')) {
        wp_enqueue_style('bootstrap', plugins_url('css/bootstrap.min.css', __FILE__));
    }
    if (!wp_style_is('wpoffdmain', 'enqueued')) {
        wp_enqueue_style('wpoffmain', plugins_url('css/offer.main.css', __FILE__));
    }
    if (!wp_style_is('lineicons', 'enqueued')) {
        wp_enqueue_style('lineicons', plugins_url('css/LineIcons.3.0.css', __FILE__));
    }
    if (!wp_style_is('glightbox', 'enqueued')) {
        wp_enqueue_style('glightbox', plugins_url('css/glightbox.min.css', __FILE__));
    }

    // Enqueue JavaScript files
    if (! wp_script_is('bootstrap', 'enqueued')) {
        wp_enqueue_script('bootstrap', plugins_url('js/bootstrap.min.js', __FILE__), ('jquery'), true);
    }
    if (! wp_script_is('glightbox', 'enqueued')) {
        wp_enqueue_script('glightbox', plugins_url('js/glightbox.min.js', __FILE__), ('jquery'), true);
    }
    if (! wp_script_is('wpoffdmain', 'enqueued')) {
        wp_enqueue_script('wpoffdmain', plugins_url('js/offer.main.js', __FILE__), ('jquery'), true);
    }
    if (! wp_script_is('tiny-slider', 'enqueued')) {
        wp_enqueue_script('tiny-slider', plugins_url('js/tiny-slider.js', __FILE__), ('jquery'), true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_elementor_offer_widget_scripts');
