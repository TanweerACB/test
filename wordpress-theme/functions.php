<?php
/**
 * VDB Law Firm Theme Functions
 */

// Theme Setup
function vdb_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vdb-law'),
        'footer' => __('Footer Menu', 'vdb-law'),
    ));
    
    // Add image sizes
    add_image_size('vdb-blog-thumb', 400, 300, true);
}
add_action('after_setup_theme', 'vdb_theme_setup');

// Enqueue styles and scripts
function vdb_enqueue_assets() {
    // Styles
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null);
    wp_enqueue_style('vdb-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    
    // Scripts
    wp_enqueue_script('vdb-main-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('vdb-main-script', 'vdbAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('vdb_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'vdb_enqueue_assets');

// Register widget areas
function vdb_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Column 1', 'vdb-law'),
        'id' => 'footer-1',
        'before_widget' => '<div class="footer__widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer__heading">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'vdb_widgets_init');

// Customizer Settings
require get_template_directory() . '/inc/customizer.php';

// Custom Post Types
require get_template_directory() . '/inc/post-types.php';

// Template Functions
require get_template_directory() . '/inc/template-functions.php';

// AJAX Handlers
function vdb_get_booking_slots() {
    check_ajax_referer('vdb_nonce', 'nonce');
    
    $date = sanitize_text_field($_POST['date']);
    $bookings = get_posts(array(
        'post_type' => 'booking',
        'meta_query' => array(
            array('key' => 'booking_date', 'value' => $date)
        )
    ));
    
    $booked_times = array();
    foreach ($bookings as $booking) {
        $booked_times[] = get_post_meta($booking->ID, 'booking_time', true);
    }
    
    $all_slots = array('09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00');
    $available = array_diff($all_slots, $booked_times);
    
    wp_send_json_success(array_values($available));
}
add_action('wp_ajax_get_booking_slots', 'vdb_get_booking_slots');
add_action('wp_ajax_nopriv_get_booking_slots', 'vdb_get_booking_slots');

function vdb_submit_booking() {
    check_ajax_referer('vdb_nonce', 'nonce');
    
    $booking_data = array(
        'post_title' => sanitize_text_field($_POST['name']),
        'post_type' => 'booking',
        'post_status' => 'publish'
    );
    
    $booking_id = wp_insert_post($booking_data);
    
    if ($booking_id) {
        update_post_meta($booking_id, 'booking_email', sanitize_email($_POST['email']));
        update_post_meta($booking_id, 'booking_phone', sanitize_text_field($_POST['phone']));
        update_post_meta($booking_id, 'booking_service', sanitize_text_field($_POST['service']));
        update_post_meta($booking_id, 'booking_date', sanitize_text_field($_POST['date']));
        update_post_meta($booking_id, 'booking_time', sanitize_text_field($_POST['time']));
        update_post_meta($booking_id, 'booking_notes', sanitize_textarea_field($_POST['notes']));
        update_post_meta($booking_id, 'booking_status', 'pending');
        
        wp_send_json_success(array('message' => 'Booking submitted successfully'));
    } else {
        wp_send_json_error(array('message' => 'Failed to submit booking'));
    }
}
add_action('wp_ajax_submit_booking', 'vdb_submit_booking');
add_action('wp_ajax_nopriv_submit_booking', 'vdb_submit_booking');
