<?php /* Loop Template used for content on index/archive/search */ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mh-loop-item mh-loop-list-item clearfix'); ?>><?php
	$format = get_post_format();
	if ($format === 'status' || $format === 'link' || $format === 'quote' || $format === 'chat') {
		tuto_post_icon_header();
	} else { ?>
		<a class="mh-loop-thumb-link" href="<?php the_permalink(); ?>">
			<figure class="mh-loop-thumb mh-loop-list-thumb"><?php
				if (has_post_thumbnail()) {
					the_post_thumbnail('tuto-medium');
				} else {
					echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-medium.png' . '" alt="' . esc_html__('No Image', 'tuto') . '" />';
				} ?>
			</figure>
		</a><?php
	} ?>
	<div class="mh-loop-content mh-loop-list-content clearfix">
		<div class="mh-loop-content-inner">
			<header class="mh-loop-header mh-loop-list-header">
				<h3 class="entry-title mh-loop-title mh-loop-list-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h3>
				<div class="mh-meta mh-loop-meta mh-loop-list-meta">
					<?php tuto_loop_meta(); ?>
				</div>
			</header>
			<div class="mh-loop-excerpt mh-loop-list-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</article>