<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="nav" id="navbar">
  <div class="nav__container">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav__logo">
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <span class="nav__logo-icon">
          <?php echo vdb_get_icon('building'); ?>
        </span>
        <?php bloginfo('name'); ?>
      <?php endif; ?>
    </a>
    
    <?php
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'container' => false,
      'menu_class' => 'nav__links',
      'menu_id' => 'navLinks',
      'fallback_cb' => false
    ));
    ?>
    
    <a href="#contact" class="btn btn--gold nav__cta">Book Consultation</a>
    
    <button class="nav__toggle" id="navToggle" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>
