<?php get_header(); ?>
<main class="dmz-content">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article <?php post_class(); ?>><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><div class="entry-content"><?php the_excerpt(); ?></div></article>
  <?php endwhile; else: ?><p>No content found.</p><?php endif; ?>
</main>
<?php get_footer(); ?>
