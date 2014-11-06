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
	<header style="background-image: url(<?php echo $page_bg_image_url ?>)">
		<?php get_template_part('templates/entry-meta'); ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-summary">
		<?php echo content(150); ?>
	</div>
</article>
