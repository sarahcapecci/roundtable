<?php
/*
Template Name: Archive
*/
?>

<section class="content-wrapper">
  <header class="home-banner">
    <div class="bg-set">
    </div>
    <div class="blue-bg font-normal">
      <h2>Welcome to the Regional Youth Roundtable.</h2>
      <p class="font-md">Igniting youth-led organizations in Peel.</p>
    </div>
  </header>

  <h2 class="blue-txt margin-top-20"><?php echo the_title(); ?></h2>
  <main class="archive top-bottom-padding">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
       <h3>Sorry, there are not posts yet.</h3>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>

      <!-- BLOG POST -->
      <?php while (have_posts()) : the_post(); ?>
		<?php wp_get_archives('type=postbypost&limit=10'); ?>
      <?php endwhile; ?>
  </main>
</section>