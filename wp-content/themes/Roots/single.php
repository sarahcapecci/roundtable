<!-- SINGLE POST TEMPLATE -->
<section class="content-wrapper">
  <header class="home-banner">
    <div class="bg-set">
    </div>
    <div class="blue-bg font-normal">
      <h2>Welcome to the Regional Youth Roundtable.</h2>
      <p class="font-md">Igniting youth-led organizations in Peel.</p>
    </div>
  </header>
  <main class="top-bottom-padding">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>
      <!-- BLOG POST -->
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', get_post_format()); ?>
      <?php endwhile; ?>
  </main>
</section>
