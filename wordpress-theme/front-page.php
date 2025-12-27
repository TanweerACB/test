<?php
/**
 * Front Page Template
 */

get_header();
$hero = vdb_get_hero_data();
$contact = vdb_get_contact_info();
?>

<!-- Hero Section -->
<section class="hero" id="hero">
  <div class="hero__bg">
    <div class="hero__bg-shape hero__bg-shape--1"></div>
    <div class="hero__bg-shape hero__bg-shape--2"></div>
    <div class="hero__grid"></div>
  </div>
  <div class="hero__container">
    <div class="hero__content">
      <div class="hero__badge">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        <?php echo esc_html($hero['badge']); ?>
      </div>
      <h1 class="hero__title">
        <?php echo esc_html($hero['title']); ?><br>
        <span class="hero__title-highlight"><?php echo esc_html($hero['title_highlight']); ?></span>
      </h1>
      <p class="hero__subtitle"><?php echo esc_html($hero['subtitle']); ?></p>
      <div class="hero__cta">
        <a href="#contact" class="btn btn--gold btn--lg">
          <?php echo vdb_get_icon('calendar'); ?>
          <?php echo esc_html($hero['cta_text']); ?>
        </a>
        <a href="#services" class="btn btn--outline btn--lg">Explore Services</a>
      </div>
      <div class="hero__features">
        <div class="hero__feature">
          <span class="hero__feature-icon">
            <?php echo vdb_get_icon('check'); ?>
          </span>
          <span>Free Initial Consultation</span>
        </div>
        <div class="hero__feature">
          <span class="hero__feature-icon">
            <?php echo vdb_get_icon('clock'); ?>
          </span>
          <span>24hr Response Time</span>
        </div>
      </div>
    </div>
    <div class="hero__card">
      <div class="hero__stats">
        <?php foreach ($hero['stats'] as $stat) : ?>
          <div class="hero__stat">
            <span class="hero__stat-number" data-target="<?php echo esc_attr($stat['number']); ?>" data-suffix="<?php echo esc_attr($stat['suffix']); ?>">0</span>
            <span class="hero__stat-label"><?php echo esc_html($stat['label']); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="hero__card-cta">
        <div>
          <p>Need urgent legal advice?</p>
          <strong><?php echo esc_html($contact['phone']); ?></strong>
        </div>
        <a href="<?php echo esc_attr(vdb_format_phone_link($contact['phone'])); ?>" class="btn btn--gold">Call Now</a>
      </div>
    </div>
  </div>
</section>

<!-- Practice Areas -->
<section class="section" id="services">
  <div class="container">
    <div class="section__header">
      <span class="section__tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        Our Services
      </span>
      <h2 class="section__title">Practice Areas</h2>
      <p class="section__subtitle">Comprehensive civil law services tailored to protect your interests and achieve your goals.</p>
    </div>
    <div class="practice-areas__grid">
      <?php
      $practice_areas = vdb_get_practice_areas(6);
      $icons = array('property', 'contract', 'family', 'litigation', 'estate', 'debt');
      
      foreach ($practice_areas as $index => $area) :
        $icon = isset($icons[$index]) ? $icons[$index] : 'property';
      ?>
        <div class="practice-card">
          <div class="practice-card__icon">
            <?php echo vdb_get_icon($icon); ?>
          </div>
          <h3 class="practice-card__title"><?php echo esc_html($area->post_title); ?></h3>
          <p class="practice-card__desc"><?php echo esc_html(wp_trim_words($area->post_content, 20)); ?></p>
          <a href="<?php echo get_permalink($area->ID); ?>" class="practice-card__link">
            Learn more
            <?php echo vdb_get_icon('arrow-right'); ?>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="section section--dark" id="about">
  <div class="container">
    <div class="section__header">
      <span class="section__tag">Why Choose Us</span>
      <h2 class="section__title">The VDB Difference</h2>
      <p class="section__subtitle">We combine traditional legal excellence with modern innovation to deliver superior outcomes.</p>
    </div>
    <div class="why-us__grid">
      <div class="why-card">
        <div class="why-card__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <h3 class="why-card__title">Tech-Forward</h3>
        <p class="why-card__desc">Leveraging technology for faster, more efficient legal solutions.</p>
      </div>
      <div class="why-card">
        <div class="why-card__icon">
          <?php echo vdb_get_icon('check'); ?>
        </div>
        <h3 class="why-card__title">Proven Results</h3>
        <p class="why-card__desc">98% success rate with over 2,500 cases won for our clients.</p>
      </div>
      <div class="why-card">
        <div class="why-card__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3 class="why-card__title">Clear Communication</h3>
        <p class="why-card__desc">Transparent updates and personalized attention throughout your case.</p>
      </div>
      <div class="why-card">
        <div class="why-card__icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
        </div>
        <h3 class="why-card__title">Award-Winning</h3>
        <p class="why-card__desc">Recognized leaders in civil law with decades of combined experience.</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="section section--dark" id="testimonials">
  <div class="container">
    <div class="section__header">
      <span class="section__tag">Testimonials</span>
      <h2 class="section__title">Client Stories</h2>
      <p class="section__subtitle">Hear from clients who trusted us with their legal matters.</p>
    </div>
    <div class="testimonials__carousel">
      <div class="testimonials__track" id="testimonialTrack">
        <?php
        $testimonials = vdb_get_testimonials(5);
        foreach ($testimonials as $testimonial) :
          $client_name = get_post_meta($testimonial->ID, 'client_name', true);
          $case_type = get_post_meta($testimonial->ID, 'case_type', true);
          $rating = get_post_meta($testimonial->ID, 'rating', true) ?: 5;
        ?>
          <div class="testimonial-card">
            <div class="testimonial-card__stars">
              <?php for ($i = 0; $i < $rating; $i++) : ?>
                <?php echo vdb_get_icon('star'); ?>
              <?php endfor; ?>
            </div>
            <p class="testimonial-card__text"><?php echo esc_html($testimonial->post_content); ?></p>
            <div class="testimonial-card__author">
              <span class="testimonial-card__name"><?php echo esc_html($client_name); ?></span>
              <span class="testimonial-card__case"><?php echo esc_html($case_type); ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="testimonials__nav">
        <button class="testimonials__arrow" id="prevBtn" aria-label="Previous">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <div class="testimonials__dots" id="testimonialDots"></div>
        <button class="testimonials__arrow" id="nextBtn" aria-label="Next">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="section" id="team">
  <div class="container">
    <div class="section__header">
      <span class="section__tag">
        <?php echo vdb_get_icon('family'); ?>
        Our Team
      </span>
      <h2 class="section__title">Meet Our Attorneys</h2>
      <p class="section__subtitle">Experienced legal professionals dedicated to achieving the best outcomes for our clients.</p>
    </div>
    <div class="team__grid">
      <?php
      $team_members = vdb_get_team_members(4);
      foreach ($team_members as $member) :
        $title = get_post_meta($member->ID, 'member_title', true);
        $specialization = get_post_meta($member->ID, 'member_specialization', true);
        $linkedin = get_post_meta($member->ID, 'member_linkedin', true);
        $initials = vdb_get_initials($member->post_title);
      ?>
        <div class="team-card">
          <div class="team-card__image">
            <?php if (has_post_thumbnail($member->ID)) : ?>
              <?php echo get_the_post_thumbnail($member->ID, 'thumbnail'); ?>
            <?php else : ?>
              <span class="team-card__placeholder"><?php echo esc_html($initials); ?></span>
            <?php endif; ?>
          </div>
          <h3 class="team-card__name"><?php echo esc_html($member->post_title); ?></h3>
          <p class="team-card__title"><?php echo esc_html($title); ?></p>
          <p class="team-card__specialization"><?php echo esc_html($specialization); ?></p>
          <div class="team-card__social">
            <?php if ($linkedin) : ?>
              <a href="<?php echo esc_url($linkedin); ?>" aria-label="LinkedIn" target="_blank">
                <?php echo vdb_get_icon('linkedin'); ?>
              </a>
            <?php endif; ?>
            <a href="mailto:<?php echo esc_attr($contact['email']); ?>" aria-label="Email">
              <?php echo vdb_get_icon('email'); ?>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Blog Section -->
<section class="section section--gray" id="blog">
  <div class="container">
    <div class="section__header">
      <span class="section__tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        Legal Insights
      </span>
      <h2 class="section__title">Latest Articles</h2>
      <p class="section__subtitle">Stay informed with our latest legal insights and updates.</p>
    </div>
    <div class="blog__grid">
      <?php
      $blog_posts = get_posts(array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC'
      ));
      
      foreach ($blog_posts as $post) :
        setup_postdata($post);
        $category = get_the_category($post->ID);
        $cat_name = !empty($category) ? $category[0]->name : 'Uncategorized';
        $author_initials = vdb_get_initials(get_the_author_meta('display_name', $post->post_author));
      ?>
        <article class="blog-card">
          <div class="blog-card__image">
            <?php if (has_post_thumbnail($post->ID)) : ?>
              <?php echo get_the_post_thumbnail($post->ID, 'vdb-blog-thumb'); ?>
            <?php else : ?>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
            <?php endif; ?>
          </div>
          <div class="blog-card__content">
            <span class="blog-card__category"><?php echo esc_html($cat_name); ?></span>
            <h3 class="blog-card__title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="blog-card__excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
            <div class="blog-card__meta">
              <div class="blog-card__author">
                <span class="blog-card__avatar"><?php echo esc_html($author_initials); ?></span>
                <span><?php the_author(); ?></span>
              </div>
              <span><?php echo get_the_date('M j, Y'); ?></span>
            </div>
          </div>
        </article>
      <?php
      endforeach;
      wp_reset_postdata();
      ?>
    </div>
    <div style="text-align: center; margin-top: 48px;">
      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn--outline">View All Articles</a>
    </div>
  </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner">
  <div class="container">
    <div class="cta-banner__content">
      <h2 class="cta-banner__title">Ready to Discuss Your Case?</h2>
      <p class="cta-banner__text">Get expert legal advice from our experienced team. Your first consultation is free.</p>
      <a href="#contact" class="btn btn--primary btn--lg">Book Free Consultation</a>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="section" id="contact">
  <div class="container">
    <div class="section__header">
      <span class="section__tag">
        <?php echo vdb_get_icon('location'); ?>
        Contact Us
      </span>
      <h2 class="section__title">Get In Touch</h2>
      <p class="section__subtitle">Schedule your free consultation or send us a message.</p>
    </div>
    <div class="contact__grid">
      <div class="contact__form-wrapper">
        <div class="contact__tabs">
          <button class="contact__tab active" data-form="message">Send Message</button>
          <button class="contact__tab" data-form="booking">Book Consultation</button>
        </div>
        
        <?php echo do_shortcode('[contact-form-7 id="1" title="Contact form"]'); ?>
        
        <form class="contact-form booking-form" id="bookingForm" style="display: none;">
          <div class="form-group">
            <label for="bookName" class="form-label">Full Name *</label>
            <input type="text" id="bookName" class="form-input" required placeholder="John Smith">
          </div>
          <div class="form-group">
            <label for="bookEmail" class="form-label">Email Address *</label>
            <input type="email" id="bookEmail" class="form-input" required placeholder="john@example.com">
          </div>
          <div class="form-group">
            <label for="bookPhone" class="form-label">Phone Number *</label>
            <input type="tel" id="bookPhone" class="form-input" required placeholder="+27 21 123 4567">
          </div>
          <div class="form-group">
            <label for="bookService" class="form-label">Service *</label>
            <select id="bookService" class="form-input form-select" required>
              <option value="">Select a service</option>
              <?php
              $services = vdb_get_practice_areas();
              foreach ($services as $service) :
              ?>
                <option value="<?php echo esc_attr($service->post_title); ?>"><?php echo esc_html($service->post_title); ?></option>
              <?php endforeach; ?>
              <option value="General Consultation">General Consultation</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="bookDate" class="form-label">Preferred Date *</label>
              <input type="date" id="bookDate" class="form-input" required>
            </div>
            <div class="form-group">
              <label for="bookTime" class="form-label">Time Slot *</label>
              <select id="bookTime" class="form-input form-select" required disabled>
                <option value="">Select date first</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="bookNotes" class="form-label">Additional Notes</label>
            <textarea id="bookNotes" class="form-input form-textarea" placeholder="Any specific details..."></textarea>
          </div>
          <button type="submit" class="btn btn--gold btn--full">Book Consultation</button>
        </form>
      </div>
      
      <div class="contact__info">
        <?php if ($contact['maps_url']) : ?>
          <div class="contact__map">
            <iframe src="<?php echo esc_url($contact['maps_url']); ?>" width="100%" height="240" style="border:0;" allowfullscreen="" loading="lazy" title="Office Location"></iframe>
          </div>
        <?php endif; ?>
        
        <div class="contact__details">
          <div class="contact__detail">
            <span class="contact__detail-icon">
              <?php echo vdb_get_icon('location'); ?>
            </span>
            <div>
              <strong>Address</strong>
              <p><?php echo esc_html($contact['address']); ?></p>
            </div>
          </div>
          <div class="contact__detail">
            <span class="contact__detail-icon">
              <?php echo vdb_get_icon('phone'); ?>
            </span>
            <div>
              <strong>Phone</strong>
              <p><?php echo esc_html($contact['phone']); ?></p>
            </div>
          </div>
          <div class="contact__detail">
            <span class="contact__detail-icon">
              <?php echo vdb_get_icon('email'); ?>
            </span>
            <div>
              <strong>Email</strong>
              <p><?php echo esc_html($contact['email']); ?></p>
            </div>
          </div>
          <div class="contact__detail">
            <span class="contact__detail-icon">
              <?php echo vdb_get_icon('clock'); ?>
            </span>
            <div>
              <strong>Hours</strong>
              <p><?php echo esc_html($contact['hours']); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
