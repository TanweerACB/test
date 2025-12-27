<?php
/**
 * Page Template
 */

get_header();
?>

<section class="section" style="padding-top: 120px;">
  <div class="container" style="max-width: 900px;">
    <?php
    while (have_posts()) :
      the_post();
    ?>
      <article class="page-content">
        <header class="page-header" style="margin-bottom: 48px; text-align: center;">
          <h1 class="section__title"><?php the_title(); ?></h1>
        </header>
        
        <?php if (has_post_thumbnail()) : ?>
          <div class="page-image" style="margin-bottom: 48px; border-radius: var(--radius-xl); overflow: hidden;">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>
        
        <div class="page-content__body" style="font-size: 17px; line-height: 1.8; color: var(--color-text-secondary);">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
