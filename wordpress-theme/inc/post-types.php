<?php
/**
 * Custom Post Types
 */

// Practice Areas Post Type
function vdb_register_practice_areas() {
    $labels = array(
        'name' => 'Practice Areas',
        'singular_name' => 'Practice Area',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Practice Area',
        'edit_item' => 'Edit Practice Area',
        'new_item' => 'New Practice Area',
        'view_item' => 'View Practice Area',
        'search_items' => 'Search Practice Areas',
        'not_found' => 'No practice areas found',
        'not_found_in_trash' => 'No practice areas found in trash'
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'practice-areas'),
    );
    
    register_post_type('practice_area', $args);
}
add_action('init', 'vdb_register_practice_areas');

// Team Members Post Type
function vdb_register_team_members() {
    $labels = array(
        'name' => 'Team Members',
        'singular_name' => 'Team Member',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team Member',
        'edit_item' => 'Edit Team Member',
        'new_item' => 'New Team Member',
        'view_item' => 'View Team Member',
        'search_items' => 'Search Team Members',
        'not_found' => 'No team members found',
        'not_found_in_trash' => 'No team members found in trash'
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'team'),
    );
    
    register_post_type('team_member', $args);
}
add_action('init', 'vdb_register_team_members');

// Testimonials Post Type
function vdb_register_testimonials() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' => 'No testimonials found',
        'not_found_in_trash' => 'No testimonials found in trash'
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor'),
        'rewrite' => array('slug' => 'testimonials'),
    );
    
    register_post_type('testimonial', $args);
}
add_action('init', 'vdb_register_testimonials');

// Bookings Post Type
function vdb_register_bookings() {
    $labels = array(
        'name' => 'Bookings',
        'singular_name' => 'Booking',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Booking',
        'edit_item' => 'Edit Booking',
        'new_item' => 'New Booking',
        'view_item' => 'View Booking',
        'search_items' => 'Search Bookings',
        'not_found' => 'No bookings found',
        'not_found_in_trash' => 'No bookings found in trash'
    );
    
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title'),
        'capability_type' => 'post',
        'capabilities' => array('create_posts' => 'do_not_allow'),
    );
    
    register_post_type('booking', $args);
}
add_action('init', 'vdb_register_bookings');

// Add meta boxes for custom post types
function vdb_add_meta_boxes() {
    // Team Member meta box
    add_meta_box('team_member_details', 'Team Member Details', 'vdb_team_member_meta_box', 'team_member', 'normal', 'high');
    
    // Testimonial meta box
    add_meta_box('testimonial_details', 'Testimonial Details', 'vdb_testimonial_meta_box', 'testimonial', 'normal', 'high');
    
    // Booking meta box
    add_meta_box('booking_details', 'Booking Details', 'vdb_booking_meta_box', 'booking', 'normal', 'high');
}
add_action('add_meta_boxes', 'vdb_add_meta_boxes');

function vdb_team_member_meta_box($post) {
    wp_nonce_field('vdb_team_member_meta', 'vdb_team_member_nonce');
    $title = get_post_meta($post->ID, 'member_title', true);
    $specialization = get_post_meta($post->ID, 'member_specialization', true);
    $linkedin = get_post_meta($post->ID, 'member_linkedin', true);
    ?>
    <p>
        <label>Title/Position:</label><br>
        <input type="text" name="member_title" value="<?php echo esc_attr($title); ?>" style="width:100%">
    </p>
    <p>
        <label>Specialization:</label><br>
        <input type="text" name="member_specialization" value="<?php echo esc_attr($specialization); ?>" style="width:100%">
    </p>
    <p>
        <label>LinkedIn URL:</label><br>
        <input type="url" name="member_linkedin" value="<?php echo esc_url($linkedin); ?>" style="width:100%">
    </p>
    <?php
}

function vdb_testimonial_meta_box($post) {
    wp_nonce_field('vdb_testimonial_meta', 'vdb_testimonial_nonce');
    $client_name = get_post_meta($post->ID, 'client_name', true);
    $case_type = get_post_meta($post->ID, 'case_type', true);
    $rating = get_post_meta($post->ID, 'rating', true);
    ?>
    <p>
        <label>Client Name:</label><br>
        <input type="text" name="client_name" value="<?php echo esc_attr($client_name); ?>" style="width:100%">
    </p>
    <p>
        <label>Case Type:</label><br>
        <input type="text" name="case_type" value="<?php echo esc_attr($case_type); ?>" style="width:100%">
    </p>
    <p>
        <label>Rating (1-5):</label><br>
        <input type="number" name="rating" value="<?php echo esc_attr($rating ?: 5); ?>" min="1" max="5">
    </p>
    <?php
}

function vdb_booking_meta_box($post) {
    $email = get_post_meta($post->ID, 'booking_email', true);
    $phone = get_post_meta($post->ID, 'booking_phone', true);
    $service = get_post_meta($post->ID, 'booking_service', true);
    $date = get_post_meta($post->ID, 'booking_date', true);
    $time = get_post_meta($post->ID, 'booking_time', true);
    $notes = get_post_meta($post->ID, 'booking_notes', true);
    $status = get_post_meta($post->ID, 'booking_status', true);
    ?>
    <p><strong>Email:</strong> <?php echo esc_html($email); ?></p>
    <p><strong>Phone:</strong> <?php echo esc_html($phone); ?></p>
    <p><strong>Service:</strong> <?php echo esc_html($service); ?></p>
    <p><strong>Date:</strong> <?php echo esc_html($date); ?></p>
    <p><strong>Time:</strong> <?php echo esc_html($time); ?></p>
    <p><strong>Notes:</strong> <?php echo esc_html($notes); ?></p>
    <p>
        <label>Status:</label><br>
        <select name="booking_status">
            <option value="pending" <?php selected($status, 'pending'); ?>>Pending</option>
            <option value="confirmed" <?php selected($status, 'confirmed'); ?>>Confirmed</option>
            <option value="cancelled" <?php selected($status, 'cancelled'); ?>>Cancelled</option>
        </select>
    </p>
    <?php
}

// Save meta box data
function vdb_save_meta_boxes($post_id) {
    // Team Member
    if (isset($_POST['vdb_team_member_nonce']) && wp_verify_nonce($_POST['vdb_team_member_nonce'], 'vdb_team_member_meta')) {
        update_post_meta($post_id, 'member_title', sanitize_text_field($_POST['member_title']));
        update_post_meta($post_id, 'member_specialization', sanitize_text_field($_POST['member_specialization']));
        update_post_meta($post_id, 'member_linkedin', esc_url_raw($_POST['member_linkedin']));
    }
    
    // Testimonial
    if (isset($_POST['vdb_testimonial_nonce']) && wp_verify_nonce($_POST['vdb_testimonial_nonce'], 'vdb_testimonial_meta')) {
        update_post_meta($post_id, 'client_name', sanitize_text_field($_POST['client_name']));
        update_post_meta($post_id, 'case_type', sanitize_text_field($_POST['case_type']));
        update_post_meta($post_id, 'rating', absint($_POST['rating']));
    }
    
    // Booking
    if (isset($_POST['booking_status'])) {
        update_post_meta($post_id, 'booking_status', sanitize_text_field($_POST['booking_status']));
    }
}
add_action('save_post', 'vdb_save_meta_boxes');
