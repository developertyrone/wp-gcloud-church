<?php get_header(); ?>

<!-- start container -->
<div id="container">
	<div class="box">
		<div id="content">
			<!-- start leftcol -->
			<div id="leftcol">
				<div class="post">
					<h2 class="title"><?php _e('Blog',churchthemes); ?></h2>
					<div class="entry">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
 						<div id="post-<?php the_ID(); ?>" class="post_excerpt listing-type events search_results">
						<?php the_post_thumbnail('event-medium', $thumb_attrs); ?>

						<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						<span><?php the_time('F jS'); ?></span>
						<p><?php $excerpt = get_the_excerpt();
							echo string_limit_words($excerpt,45);
							?></p>

						<span><a href="<?php the_permalink(); ?>" title="More info" class="underline"><?php _e('Read More',churchthemes); ?></a></span>

					</div>           
					<?php endwhile; ?>		
					<?php endif; ?>
				</div> <!-- //. entry -->
			</div> <!-- //. post -->

			<?php if (function_exists("pagination")) {
			pagination($additional_loop->max_num_pages);
			} ?>

		</div>
		<!-- end leftcol -->
		<!-- start rightcol -->
		<div id="rightcol">
			<?php get_sidebar(); ?>
		</div>
		<!-- end rightcol -->
		<div class="clear"></div>
	</div>	
	<div class="clear"></div>
</div>
</div>
<!-- end container -->
<?php get_footer(); ?>