<?php
/*
Template Name: Members Torch Page

This is the page where the information about members is going to be displayed
*/

$membersPage = new WP_Query(
	array(
		'post_type' => 'member',
	)
);
?>

<div class="content-wrapper">
	<div class="left-side inline-block vertical-al-top relative">
		<a class="absolute tablet-show black-link" href="https://twitter.com/YouthRoundtable/lists/ryr-members" target="_blank">Open list <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_twitter.png" alt=""></a>
		<h3 class="orange-txt margin-bottom-20 title">Member Organizations</h3>
		<?php if ( $membersPage->have_posts() ) : ?>
			<?php while ( $membersPage->have_posts() ) : $membersPage->the_post(); ?>
					
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
			    	<?php if(get_sub_field('facebook')): ?> 
			    	   <a class="inline-block text-al-center" target="_blank" href="http://facebook.com/<?php echo get_sub_field('facebook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_facebook.png" alt=""></a>
			    	<?php endif; ?>	
					<?php if(get_sub_field('instagram')): ?> 
					   <a class="inline-block text-al-center" target="_blank" href="http://instagram.com/<?php echo get_sub_field('instagram'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_instagram.png" alt=""></a>
					<?php endif; ?>			
					<?php if(get_sub_field('twitter')): ?>		
					<a class="inline-block text-al-center" target="_blank" href="http://twitter.com/<?php echo get_sub_field('twitter'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/social_twitter.png" alt=""></a>
					<?php endif; ?>
			    </div>
			</div>
			<?php endwhile; ?>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif;  ?>	
	</div>
	<div class="right-side members inline-block vertical-al-top tablet-hide">
		<h3 class="orange-txt margin-bottom-20">Live Updates</h3>
		<?php if (roots_display_sidebar()) : ?>
		  <aside role="complementary">
		    <?php include roots_sidebar_path(); ?>
		  </aside><!-- /.sidebar -->
		<?php endif; ?>
	</div>
</div>