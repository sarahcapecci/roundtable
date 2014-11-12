<?php
/*
Template Name: Team Page

This is the page where the team will be displayed
*/
?>
<div class="content-wrapper">
	<h3 class="orange-txt"><?php echo get_field('exec_title'); ?></h3>
	<!-- Executive Board -->
		<?php while( has_sub_field('executive_member') ): ?>
			<div class="team-card card-look min-height inline-block vertical-al-top">
				<?php $member_img = get_sub_field('image'); ?>
		    	<span class="bg-set pic-thumbnail" style="background-image: url(<?php echo $member_img['url'] ?>);">
		    </span>
		    	<h3 class="text-al-center font-lg"><?php echo get_sub_field('name'); ?></h3>
		    	<h4 class="text-al-center gray-txt font-md"><?php echo get_sub_field('title'); ?></h4>
		    	<p><?php echo get_sub_field('short_description'); ?></p>
		    </div>
		<?php endwhile; ?>
	
	<!-- Advisory Board -->
	<h3 class="orange-txt"><?php echo get_field('advisory_title'); ?></h3>
		<?php while( has_sub_field('advisory_member') ): ?>
			<div class="team-card inline-block vertical-al-top">
				<?php $member_img = get_sub_field('image'); ?>
			    <span class="bg-set pic-thumbnail" style="background-image: url(<?php echo $member_img['url'] ?>);">
			    </span>
			    <h3 class="text-al-center font-lg"><?php echo get_sub_field('name'); ?></h3>
			    <h4 class="text-al-center gray-txt font-md"><?php echo get_sub_field('title'); ?></h4>
		    </div>
		<?php endwhile; ?>
	<!-- Committees -->
	<div>
		<?php while( has_sub_field('committee') ): ?>
			<div class="committees inline-block vertical-al-top">
			    <h3 class="orange-txt"><?php echo get_sub_field('name'); ?></h3>
			    <div><?php echo get_sub_field('members'); ?></div>
		    </div>
		<?php endwhile; ?>
	</div>
	
</div>