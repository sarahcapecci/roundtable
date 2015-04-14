<?php
/*
Template Name: About Torch Page

This is the page where the About content is displayed
*/
	// check to see if the theme supports Featured Images, and one is set
	if (has_post_thumbnail( $post->ID )) {
	        
	    // specify desired image size in place of 'full'
	    $page_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	    $page_bg_image_url = $page_bg_image[0]; // this returns just the URL of the image

	} else {
	    // the fallback – our current active theme's default bg image
	    $page_bg_image_url = get_background_image();
	}

	$aboutContent = new WP_Query(
		array(
			'post_type' => 'abt',
		)
	); 
?>

<div class="content-wrapper">
	<div class="about-header bg-set" style="background-image: url(<?php echo $page_bg_image_url ?>);">
	</div>
	<p class="about-text text-al-center font-lg">The <span class="blue-txt">Regional Youth Roundtable</span> is a platform for sharing ideas and initiatives between youth-led organizations in Peel, while alleviating pressures facing minority youth.</p>
	<div class="vertical-al-top about-text inline-block">

	<?php if ( $aboutContent->have_posts() ) : ?>
		<!-- text on the right -->
		<?php while ($aboutContent->have_posts()) : $aboutContent->the_post(); ?>
		  <?php echo the_content(); ?>
		<?php endwhile; ?>
	</div>

		<!-- image on the left -->
		<?php $small_image = get_field('small_image'); ?>
		<div class="vertical-al-top bg-set about-thumbnail inline-block" style="background-image: url(<?php echo $small_image['url'] ?>);"></div>
		
		<!-- Mission and Vision -->
		<section class="values">
			<h3 class="orange-txt text-al-center">Our Mission</h3>
			<?php echo get_field('mission'); ?>
		</section>
		<section class="values">
			<h3 class="orange-txt text-al-center">Our Vision</h3>
			<?php echo get_field('vision'); ?>
		</section>

		<!-- PROGRAMS -->
		<section class="margin-top-40">
			<h3 class="orange-txt text-al-center margin-bottom-20">Our Programs</h3>
			<?php while( has_sub_field('programs') ): ?>
			<div class="program-card card-look min-height inline-block vertical-al-top margin-bottom-20">
				<?php $program_img = get_sub_field('image'); ?>
			    <span class="pic-thumbnail bg-set" style="background-image: url(<?php echo $program_img['url'] ?>);">
			    </span>
			    <h3 class="text-al-center font-lg"><?php echo get_sub_field('name'); ?></h3>
			    <h4 class="text-al-center gray-txt font-md"><?php echo get_sub_field('tagline'); ?></h4>
			    <p class="font-md text-al-center"><?php echo get_sub_field('description'); ?></p>
			    <a class="block text-al-center margin-bottom-10" href="http://<?php echo get_sub_field('program_website'); ?>"><?php echo get_sub_field('website'); ?></a>
			</div>
			<?php endwhile; ?>
		</section>

		<!-- Sponsors -->
		<div class="sponsors">
		<h3 class="blue-txt font-semi-bold">Our Sponsors &amp; Funders</h3>
			<?php while( has_sub_field('sponsors') ): ?>
				<?php $sponsor_img = get_sub_field('thumbnail'); ?>
			    <span class="thumbnail bg-set" style="background-image: url(<?php echo $sponsor_img['url'] ?>);">
			    </span>
			<?php endwhile; ?>
		</div>

		<!-- PARTNERS -->
		<div class="sponsors">
			<h3 class="blue-txt font-semi-bold">Our Partners &amp; Friends</h3>
			<?php while( has_sub_field('partners') ): ?>
				<?php $partner_img = get_sub_field('thumbnail'); ?>
			    <span class="thumbnail bg-set" style="background-image: url(<?php echo $partner_img['url'] ?>);">
			    </span>
			<?php endwhile; ?>
		</div>

		<?php wp_reset_postdata(); ?>
	<?php endif;  ?>
</div>