<?php
/**
 * Index Template (Fallback)
 */

get_header();
?>

<section class="section" style="padding-top: 120px;">
  <div class="container">
    <?php if (have_posts()) : ?>
      <div class="blog__grid">
        <?php
        while (have_posts()) :
          the_post();
          $category = get_the_category();
          $cat_name = !empty($category) ? $category[0]->name : 'Uncategorized';
          $author_initials = vdb_get_initials(get_the_author());
        ?>
          <article class="blog-card">
            <div class="blog-card__image">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('vdb-blog-thumb'); ?>
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
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <p style="text-align: center; padding: 48px 0;">No content found.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
