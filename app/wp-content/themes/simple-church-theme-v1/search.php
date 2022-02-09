<?php get_header(); ?>

<!-- start container -->
<div id="container">
<div class="box">
	<div id="content">
	<!-- start leftcol -->
		<div id="leftcol">

			<h2 class="result_heading"><?php _e('Search results for',churchthemes); ?> "<?php printf(__(\'%s'\), $s) ?>"</h2>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post">
				<div class="entry">
					<div class="post_excerpt search_results">
						<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<?php the_excerpt(); ?>
						<span><a href="<?php the_permalink(); ?>" title="Read more" class="underline"><?php _e('Read more',churchthemes); ?></a></span>
					</div>
				</div><!-- /.entry -->
			</div><!-- /.post -->
			<?php endwhile; else: ?>
			<div class="post">
				<div class="entry">
					<p><?php _e('Nothing found here for your search, please check for the keyword you searched for or',churchthemes); ?> <a href="<?php bloginfo('home'); ?>" title="Go Home"><?php _e('head back home',churchthemes); ?></a> <?php _e('and start over',churchthemes); ?></p>
				</div><!-- /.entry -->
			</div><!-- /.post -->

			<?php endif; ?>
			<div class="clear"></div>
			<!-- start pagination -->
			<?php if (function_exists("pagination")) {
			pagination($additional_loop->max_num_pages);
			} ?>
			<!-- end pagination -->
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