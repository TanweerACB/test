<?php
/**
 * Single Post Template
 */

get_header();
?>

<section class="section" style="padding-top: 120px;">
  <div class="container" style="max-width: 800px;">
    <?php
    while (have_posts()) :
      the_post();
      $category = get_the_category();
      $cat_name = !empty($category) ? $category[0]->name : 'Uncategorized';
    ?>
      <article class="single-post">
        <header class="single-post__header" style="margin-bottom: 48px;">
          <span class="blog-card__category" style="display: inline-block; margin-bottom: 16px;">
            <?php echo esc_html($cat_name); ?>
          </span>
          <h1 class="section__title" style="text-align: left; margin-bottom: 24px;">
            <?php the_title(); ?>
          </h1>
          <div class="blog-card__meta">
            <div class="blog-card__author">
              <span class="blog-card__avatar"><?php echo esc_html(vdb_get_initials(get_the_author())); ?></span>
              <span><?php the_author(); ?></span>
            </div>
            <span><?php echo get_the_date('F j, Y'); ?></span>
          </div>
        </header>
        
        <?php if (has_post_thumbnail()) : ?>
          <div class="single-post__image" style="margin-bottom: 48px; border-radius: var(--radius-xl); overflow: hidden;">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>
        
        <div class="single-post__content" style="font-size: 17px; line-height: 1.8; color: var(--color-text-secondary);">
          <?php the_content(); ?>
        </div>
        
        <footer class="single-post__footer" style="margin-top: 64px; padding-top: 32px; border-top: 1px solid var(--color-border-light);">
          <div style="text-align: center;">
            <h3 style="margin-bottom: 16px;">Need Legal Advice?</h3>
            <p style="color: var(--color-text-secondary); margin-bottom: 24px;">
              Contact our team for a free consultation
            </p>
            <a href="<?php echo home_url('/#contact'); ?>" class="btn btn--gold">Get In Touch</a>
          </div>
        </footer>
      </article>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
