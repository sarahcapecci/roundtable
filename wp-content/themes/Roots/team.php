<?php
/*
Template Name: Team Page

This is the page where the team will be displayed
*/
?>

<h2>Team</h2>
<h3><?php echo get_field('exec_title'); ?></h3>
<div>
	<?php while( has_sub_field('executive_member') ): ?>
		<?php $member_img = get_sub_field('image'); ?>
	    <span class="whatever" style="background-image: url(<?php echo $member_img['url'] ?>);">
	    </span>
	    <span><?php echo get_sub_field('name'); ?></span>
	    <span><?php echo get_sub_field('title'); ?></span>
	    <p><?php echo get_sub_field('short_description'); ?></p>
	<?php endwhile; ?>
</div>

<h3><?php echo get_field('advisory_title'); ?></h3>
<div>
	<?php while( has_sub_field('advisory_member') ): ?>
		<?php $member_img = get_sub_field('image'); ?>
	    <span class="whatever" style="background-image: url(<?php echo $member_img['url'] ?>);">
	    </span>
	    <span><?php echo get_sub_field('name'); ?></span>
	    <span><?php echo get_sub_field('title'); ?></span>
	<?php endwhile; ?>
</div>

<div>
	<div>
		<?php while( has_sub_field('committee') ): ?>
			<?php $member_img = get_sub_field('image'); ?>
		    <span><?php echo get_sub_field('name'); ?></span>
		    <div><?php echo get_sub_field('members'); ?></div>
		<?php endwhile; ?>
	</div>
</div>