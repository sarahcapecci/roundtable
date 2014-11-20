<?php
/*
Template Name: Members Page

This is the page where the information about members is going to be displayed
*/
?>

<div class="content-wrapper">
	<div class="left-side inline-block vertical-al-top relative">
		<a class="absolute tablet-show black-link" href="https://twitter.com/YouthRoundtable/lists/ryr-members" target="_blank">Open list <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_twitter.png" alt=""></a>
		<h3 class="orange-txt margin-bottom-20 title">Member Organizations</h3>
		<?php while( has_sub_field('organization') ): ?>
		<div class="member-card card-look min-height inline-block vertical-al-top margin-bottom-20">
			<?php $member_img = get_sub_field('image'); ?>
		    <span class="pic-thumbnail bg-set" style="background-image: url(<?php echo $member_img['url'] ?>);">
		    </span>
		    <h3 class="text-al-center font-lg"><?php echo get_sub_field('name'); ?></h3>
		    <h4 class="text-al-center gray-txt font-md"><?php echo get_sub_field('tagline'); ?></h4>
		    <p class="text-al-center"><?php echo get_sub_field('description'); ?></p>
		    <a class="block text-al-center margin-bottom-10" href="http://<?php echo get_sub_field('website'); ?>"><?php echo get_sub_field('website'); ?></a>
		    <div class="social text-al-center">
			    <a class="inline-block text-al-center" target="_blank" href="http://facebook.com/<?php echo get_sub_field('facebook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_facebook.png" alt=""></a>
			    <a class="inline-block text-al-center" target="_blank" href="http://instagram.com/<?php echo get_sub_field('instagram'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_instagram.png" alt=""></a>
			    <a class="inline-block text-al-center" target="_blank" href="http://twitter.com/<?php echo get_sub_field('twitter'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_twitter.png" alt=""></a>
		    </div>
		</div>
		<?php endwhile; ?>
	</div>
	<div class="right-side inline-block vertical-al-top tablet-hide">
		<h3 class="orange-txt margin-bottom-20">Live Updates</h3>
		<?php if (roots_display_sidebar()) : ?>
		  <aside role="complementary">
		    <?php include roots_sidebar_path(); ?>
		  </aside><!-- /.sidebar -->
		<?php endif; ?>
	</div>
</div>