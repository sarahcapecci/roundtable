<?php
/*
Template Name: Members Page

This is the page where the information about members is going to be displayed
*/
?>

<div>
	<h3>Member Organizations</h3>
	<div>
		<?php while( has_sub_field('organization') ): ?>
			<?php $member_img = get_sub_field('image'); ?>
		    <span class="whatever" style="background-image: url(<?php echo $member_img['url'] ?>);">
		    </span>
		    <span><?php echo get_sub_field('name'); ?></span>
		    <span><?php echo get_sub_field('tagline'); ?></span>
		    <p><?php echo get_sub_field('description'); ?></p>
		    <a href="http://<?php echo get_sub_field('website'); ?>"><?php echo get_sub_field('website'); ?></a>
		    <a href="http://twitter.com/<?php echo get_sub_field('twitter'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.png" alt=""></a>
		<?php endwhile; ?>
	</div>
</div>

<div>
	<h3>Live Updates</h3>
	<?php if (roots_display_sidebar()) : ?>
	  <aside class="sidebar" role="complementary">
	    <?php include roots_sidebar_path(); ?>
	  </aside><!-- /.sidebar -->
	<?php endif; ?>
</div>