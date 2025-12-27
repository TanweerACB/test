  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer__grid">
        <div class="footer__brand">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
            <span class="footer__logo-icon">
              <?php echo vdb_get_icon('building'); ?>
            </span>
            <?php bloginfo('name'); ?>
          </a>
          <p class="footer__tagline"><?php bloginfo('description'); ?></p>
        </div>
        
        <div class="footer__links">
          <h4 class="footer__heading">Quick Links</h4>
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'fallback_cb' => false
          ));
          ?>
        </div>
        
        <div class="footer__links">
          <h4 class="footer__heading">Practice Areas</h4>
          <ul>
            <?php
            $practice_areas = vdb_get_practice_areas(5);
            foreach ($practice_areas as $area) :
            ?>
              <li><a href="<?php echo get_permalink($area->ID); ?>"><?php echo esc_html($area->post_title); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        
        <div class="footer__links">
          <h4 class="footer__heading">Contact</h4>
          <?php $contact = vdb_get_contact_info(); ?>
          <ul>
            <li><?php echo esc_html($contact['address']); ?></li>
            <li><?php echo esc_html($contact['phone']); ?></li>
            <li><?php echo esc_html($contact['email']); ?></li>
          </ul>
        </div>
      </div>
      
      <div class="footer__bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <div class="footer__social">
          <a href="#" aria-label="LinkedIn">
            <?php echo vdb_get_icon('linkedin'); ?>
          </a>
          <a href="#" aria-label="Twitter">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
          </a>
          <a href="#" aria-label="Facebook">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
