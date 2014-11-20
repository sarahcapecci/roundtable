<div class="post-meta relative">
	<time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
	<p class="inline-block">|  <?php echo __('By', 'roots'); ?> <a class="white-link" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
	<span class="divider tablet-hide"></span>
</div>
