<?php
/*
Template Name: Members Page

This is the page where the information about members is going to be displayed
*/
?>

<div class="content-wrapper">
	<div class="left-side inline-block vertical-al-top">
		<h3 class="orange-txt margin-bottom-20">Member Organizations</h3>
		<?php while( has_sub_field('organization') ): ?>
		<div class="member-card card-look min-height inline-block vertical-al-top margin-bottom-20">
			<?php $member_img = get_sub_field('image'); ?>
		    <span class="pic-thumbnail bg-set" style="background-image: url(<?php echo $member_img['url'] ?>);">
		    </span>
		    <h3 class="text-al-center font-lg"><?php echo get_sub_field('name'); ?></h3>
		    <h4 class="text-al-center gray-txt font-md"><?php echo get_sub_field('tagline'); ?></h4>
		    <p class="text-al-center"><?php echo get_sub_field('description'); ?></p>
		    <a class="block text-al-center margin-bottom-10" href="http://<?php echo get_sub_field('website'); ?>"><?php echo get_sub_field('website'); ?></a>
		    <a class="block text-al-center" href="http://twitter.com/<?php echo get_sub_field('twitter'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.png" alt=""></a>
		</div>
		<?php endwhile; ?>
	</div>
	<div class="right-side inline-block vertical-al-top">
		<h3 class="orange-txt margin-bottom-20">Live Updates</h3>
		<?php if (roots_display_sidebar()) : ?>
		  <aside role="complementary">
		    <?php include roots_sidebar_path(); ?>
		  </aside><!-- /.sidebar -->
		<?php endif; ?>
	</div>
</div>