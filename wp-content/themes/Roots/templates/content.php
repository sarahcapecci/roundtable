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
			<h2 class="entry-title margin-bottom-20"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<a class="white-link" href=""><i class="fa fa-share"></i>Share</a>
		</header>
		<div class="relative bg-set featured" style="background-image: url(<?php echo $page_bg_image_url ?>)">
			<?php if ($wp_query->max_num_pages > 1) : ?>
			  <nav class="post-pagination">
			    <ul>
			      <li class="previous"><?php next_posts_link(__('&larr; Older', 'roots')); ?></li>
			      <li class="next"><?php previous_posts_link(__('Newer &rarr;', 'roots')); ?></li>
			    </ul>
			  </nav>
			<?php endif; ?>
		</div>
		
	</div>
	<div class="entry-summary inline-block">
		<img class="margin-bottom-10" src="<?php echo get_template_directory_uri(); ?>/assets/img/post_devider.png" alt="">
		<?php echo content(150); ?>
	</div>
</article>
