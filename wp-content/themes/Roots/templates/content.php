<article <?php post_class(); ?>>
	<?php 
	// check to see if the theme supports Featured Images, and one is set
	    if (has_post_thumbnail( $post->ID )) {
	            
	        // specify desired image size in place of 'full'
	        $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	        $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

	    } else {
	        // the fallback – our current active theme's default bg image
	        $page_bg_image_url = get_background_image();
	    }

	 ?>
	<div class="preview inline-block">
		<header class="orange-bg">
			<?php get_template_part('templates/entry-meta'); ?>
			<h2 class="entry-title margin-bottom-20 font-light white-txt"><?php the_title(); ?></h2>
			<a class="white-link" href=""><i class="fa fa-share-square-o font-md margin-right-5"></i>Share</a>
			<?php if ($wp_query->max_num_pages > 1) : ?>
			<a class="mobile-pagination white-link absolute mobile-show" href="<?php echo esc_url(home_url('/')); ?>archive">More Updates</a>
			<nav class="mobile-pagination absolute">
			<ul>
			  <li class="previous"><?php next_posts_link(__('&larr;', 'roots')); ?></li>
			  <li class="next"><?php previous_posts_link(__('&rarr;', 'roots')); ?></li>
			</ul>
			</nav>
			<?php endif; ?>	
		</header>
		<div class="relative bg-set featured mobile-hide" style="background-image: url(<?php echo $page_bg_image_url ?>)">
			<a class="black-link absolute" href="<?php echo esc_url(home_url('/')); ?>archive">View All</a>
		</div>
		
	</div>
	<div class="entry-summary inline-block relative">
		<?php if ($wp_query->max_num_pages > 1) : ?>
		<span class="divider mobile-hide"></span>
		  <nav class="post-pagination mobile-hide">
		    <ul>
		      <li class="previous"><?php next_posts_link(__('&larr;', 'roots')); ?></li>
		      <li class="next"><?php previous_posts_link(__('&rarr;', 'roots')); ?></li>
		    </ul>
		  </nav>
		<?php endif; ?>
		<?php echo the_content(); ?>
	</div>
</article>
