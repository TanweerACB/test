<?php
/**
 * Template Helper Functions
 */

// Get hero section data
function vdb_get_hero_data() {
    return array(
        'badge' => get_theme_mod('hero_badge', "Cape Town's Premier Law Firm"),
        'title' => get_theme_mod('hero_title', 'Modern Legal'),
        'title_highlight' => get_theme_mod('hero_title_highlight', 'Excellence'),
        'subtitle' => get_theme_mod('hero_subtitle', 'We combine decades of legal expertise with innovative technology to deliver exceptional results.'),
        'cta_text' => get_theme_mod('hero_cta_text', 'Schedule Consultation'),
        'stats' => array(
            array(
                'number' => get_theme_mod('stat_1_number', 25),
                'suffix' => get_theme_mod('stat_1_suffix', '+'),
                'label' => get_theme_mod('stat_1_label', 'Years Experience')
            ),
            array(
                'number' => get_theme_mod('stat_2_number', 2500),
                'suffix' => get_theme_mod('stat_2_suffix', '+'),
                'label' => get_theme_mod('stat_2_label', 'Cases Won')
            ),
            array(
                'number' => get_theme_mod('stat_3_number', 98),
                'suffix' => get_theme_mod('stat_3_suffix', '%'),
                'label' => get_theme_mod('stat_3_label', 'Success Rate')
            )
        )
    );
}

// Get contact info
function vdb_get_contact_info() {
    return array(
        'phone' => get_theme_mod('contact_phone', '+27 21 123 4567'),
        'email' => get_theme_mod('contact_email', 'info@vdblaw.co.za'),
        'address' => get_theme_mod('contact_address', '123 Long Street, Cape Town, 8001'),
        'hours' => get_theme_mod('contact_hours', 'Mon-Fri: 8:00 AM - 5:00 PM'),
        'maps_url' => get_theme_mod('google_maps_embed', '')
    );
}

// Get practice areas
function vdb_get_practice_areas($limit = -1) {
    return get_posts(array(
        'post_type' => 'practice_area',
        'posts_per_page' => $limit,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
}

// Get team members
function vdb_get_team_members($limit = -1) {
    return get_posts(array(
        'post_type' => 'team_member',
        'posts_per_page' => $limit,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
}

// Get testimonials
function vdb_get_testimonials($limit = -1) {
    return get_posts(array(
        'post_type' => 'testimonial',
        'posts_per_page' => $limit,
        'orderby' => 'date',
        'order' => 'DESC'
    ));
}

// Get SVG icon by name
function vdb_get_icon($name) {
    $icons = array(
        'property' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        'contract' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
        'family' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'litigation' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>',
        'estate' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'debt' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
        'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        'arrow-right' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
        'star' => '<svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
        'linkedin' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>',
        'email' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
        'phone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
        'location' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'calendar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
        'building' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 14v3M12 14v3M16 14v3"/></svg>'
    );
    
    return isset($icons[$name]) ? $icons[$name] : '';
}

// Format phone number for tel: link
function vdb_format_phone_link($phone) {
    return 'tel:' . preg_replace('/[^0-9+]/', '', $phone);
}

// Get initials from name
function vdb_get_initials($name) {
    $words = explode(' ', $name);
    $initials = '';
    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
    }
    return $initials;
}
