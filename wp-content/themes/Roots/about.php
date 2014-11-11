<?php
/*
Template Name: About Page

This is the page where the About content is displayed
*/
?>

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
<div class="about-header bg-set" style="background-image: url(<?php echo $page_bg_image_url ?>);">
</div>
<?php $small_image = get_field('small_image'); ?>
<div class="whatever-bigger" style="background-image: url(<?php echo $small_image['url'] ?>);"></div>
<h3>MISSION</h3>
<?php echo get_field('mission'); ?>
<h3>VISION</h3>
<?php echo get_field('vision'); ?>

<h3>Sponsors</h3>
<?php while( has_sub_field('sponsors') ): ?>
	<?php $sponsor_img = get_sub_field('thumbnail'); ?>
    <span class="whatever" style="background-image: url(<?php echo $sponsor_img['url'] ?>);">
    </span>
<?php endwhile; ?>

<h3>Partners and Friends</h3>
<?php while( has_sub_field('partners') ): ?>
	<?php $partner_img = get_sub_field('thumbnail'); ?>
    <span class="whatever" style="background-image: url(<?php echo $partner_img['url'] ?>);">
    </span>
<?php endwhile; ?>