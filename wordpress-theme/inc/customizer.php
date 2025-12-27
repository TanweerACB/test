<?php
/**
 * Theme Customizer
 */

function vdb_customize_register($wp_customize) {
    
    // ===== COLORS PANEL =====
    $wp_customize->add_panel('vdb_colors', array(
        'title' => __('Colors', 'vdb-law'),
        'priority' => 30,
    ));
    
    // Background Colors
    $wp_customize->add_section('vdb_bg_colors', array(
        'title' => __('Background Colors', 'vdb-law'),
        'panel' => 'vdb_colors',
    ));
    
    $wp_customize->add_setting('bg_primary', array('default' => '#FFFFFF', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_primary', array(
        'label' => __('Primary Background', 'vdb-law'),
        'section' => 'vdb_bg_colors',
    )));
    
    $wp_customize->add_setting('bg_secondary', array('default' => '#FAFBFC', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_secondary', array(
        'label' => __('Secondary Background', 'vdb-law'),
        'section' => 'vdb_bg_colors',
    )));
    
    $wp_customize->add_setting('bg_dark', array('default' => '#0A0E1A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_dark', array(
        'label' => __('Dark Background', 'vdb-law'),
        'section' => 'vdb_bg_colors',
    )));
    
    // Accent Colors
    $wp_customize->add_section('vdb_accent_colors', array(
        'title' => __('Accent Colors', 'vdb-law'),
        'panel' => 'vdb_colors',
    ));
    
    $wp_customize->add_setting('accent_primary', array('default' => '#111827', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_primary', array(
        'label' => __('Primary Accent', 'vdb-law'),
        'section' => 'vdb_accent_colors',
    )));
    
    $wp_customize->add_setting('accent_blue', array('default' => '#2563EB', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_blue', array(
        'label' => __('Blue Accent', 'vdb-law'),
        'section' => 'vdb_accent_colors',
    )));
    
    // Text Colors
    $wp_customize->add_section('vdb_text_colors', array(
        'title' => __('Text Colors', 'vdb-law'),
        'panel' => 'vdb_colors',
    ));
    
    $wp_customize->add_setting('text_primary', array('default' => '#0F172A', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_primary', array(
        'label' => __('Primary Text', 'vdb-law'),
        'section' => 'vdb_text_colors',
    )));
    
    $wp_customize->add_setting('text_secondary', array('default' => '#475569', 'sanitize_callback' => 'sanitize_hex_color'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_secondary', array(
        'label' => __('Secondary Text', 'vdb-law'),
        'section' => 'vdb_text_colors',
    )));
    
    // ===== HERO SECTION =====
    $wp_customize->add_section('vdb_hero', array(
        'title' => __('Hero Section', 'vdb-law'),
        'priority' => 40,
    ));
    
    $wp_customize->add_setting('hero_badge', array('default' => "Cape Town's Premier Law Firm", 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('hero_badge', array(
        'label' => __('Hero Badge Text', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_title', array('default' => 'Modern Legal', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_title_highlight', array('default' => 'Excellence', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('hero_title_highlight', array(
        'label' => __('Hero Title Highlight', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array('default' => 'We combine decades of legal expertise with innovative technology to deliver exceptional results.', 'sanitize_callback' => 'sanitize_textarea_field'));
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_cta_text', array('default' => 'Schedule Consultation', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('hero_cta_text', array(
        'label' => __('CTA Button Text', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    // Stats
    $wp_customize->add_setting('stat_1_number', array('default' => '25', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('stat_1_number', array(
        'label' => __('Stat 1 Number', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'number',
    ));
    
    $wp_customize->add_setting('stat_1_suffix', array('default' => '+', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_1_suffix', array(
        'label' => __('Stat 1 Suffix', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('stat_1_label', array('default' => 'Years Experience', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_1_label', array(
        'label' => __('Stat 1 Label', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('stat_2_number', array('default' => '2500', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('stat_2_number', array(
        'label' => __('Stat 2 Number', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'number',
    ));
    
    $wp_customize->add_setting('stat_2_suffix', array('default' => '+', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_2_suffix', array(
        'label' => __('Stat 2 Suffix', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('stat_2_label', array('default' => 'Cases Won', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_2_label', array(
        'label' => __('Stat 2 Label', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('stat_3_number', array('default' => '98', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('stat_3_number', array(
        'label' => __('Stat 3 Number', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'number',
    ));
    
    $wp_customize->add_setting('stat_3_suffix', array('default' => '%', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_3_suffix', array(
        'label' => __('Stat 3 Suffix', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('stat_3_label', array('default' => 'Success Rate', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_3_label', array(
        'label' => __('Stat 3 Label', 'vdb-law'),
        'section' => 'vdb_hero',
        'type' => 'text',
    ));
    
    // ===== CONTACT INFO =====
    $wp_customize->add_section('vdb_contact', array(
        'title' => __('Contact Information', 'vdb-law'),
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('contact_phone', array('default' => '+27 21 123 4567', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone Number', 'vdb-law'),
        'section' => 'vdb_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array('default' => 'info@vdblaw.co.za', 'sanitize_callback' => 'sanitize_email'));
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email Address', 'vdb-law'),
        'section' => 'vdb_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_address', array('default' => '123 Long Street, Cape Town, 8001', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'vdb-law'),
        'section' => 'vdb_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_hours', array('default' => 'Mon-Fri: 8:00 AM - 5:00 PM', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_hours', array(
        'label' => __('Business Hours', 'vdb-law'),
        'section' => 'vdb_contact',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('google_maps_embed', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('google_maps_embed', array(
        'label' => __('Google Maps Embed URL', 'vdb-law'),
        'section' => 'vdb_contact',
        'type' => 'url',
    ));
    
    // ===== STYLING OPTIONS =====
    $wp_customize->add_section('vdb_styling', array(
        'title' => __('Styling Options', 'vdb-law'),
        'priority' => 60,
    ));
    
    $wp_customize->add_setting('border_radius', array('default' => '16', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('border_radius', array(
        'label' => __('Border Radius (px)', 'vdb-law'),
        'section' => 'vdb_styling',
        'type' => 'number',
        'input_attrs' => array('min' => 0, 'max' => 50),
    ));
    
    $wp_customize->add_setting('section_padding', array('default' => '100', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('section_padding', array(
        'label' => __('Section Padding (px)', 'vdb-law'),
        'section' => 'vdb_styling',
        'type' => 'number',
        'input_attrs' => array('min' => 0, 'max' => 200),
    ));
}
add_action('customize_register', 'vdb_customize_register');

// Output custom CSS
function vdb_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --color-bg-primary: <?php echo get_theme_mod('bg_primary', '#FFFFFF'); ?>;
            --color-bg-secondary: <?php echo get_theme_mod('bg_secondary', '#FAFBFC'); ?>;
            --color-bg-dark: <?php echo get_theme_mod('bg_dark', '#0A0E1A'); ?>;
            --color-accent: <?php echo get_theme_mod('accent_primary', '#111827'); ?>;
            --color-accent-blue: <?php echo get_theme_mod('accent_blue', '#2563EB'); ?>;
            --color-text-primary: <?php echo get_theme_mod('text_primary', '#0F172A'); ?>;
            --color-text-secondary: <?php echo get_theme_mod('text_secondary', '#475569'); ?>;
            --radius-lg: <?php echo get_theme_mod('border_radius', '16'); ?>px;
            --radius-xl: <?php echo get_theme_mod('border_radius', '16') + 8; ?>px;
        }
        .section {
            padding: <?php echo get_theme_mod('section_padding', '100'); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'vdb_customizer_css');
