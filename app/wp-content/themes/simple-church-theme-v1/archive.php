<?php get_header(); ?>


<!-- start container -->
<div id="container">
	<div class="box">
		<div id="content">
			<!-- start leftcol -->
			<div id="leftcol">

			<?php if (is_category()) { ?>
			<h2 class="result_heading"><?php _e('Entries Tagged as',churchthemes); ?> &lsquo;<?php echo single_cat_title(); ?>&rsquo;</h2>        

			<?php } elseif (is_day()) { ?>
			<h2 class="result_heading"><?php _e('Archive',churchthemes); ?> | <?php the_time('F jS, Y'); ?></h2>
			
			<?php } elseif (is_month()) { ?>
			<h2 class="result_heading"><?php _e('Archive',churchthemes); ?> | <?php the_time('F, Y'); ?></h2>

			<?php } elseif (is_year()) { ?>
			<h2 class="result_heading"><?php _e('Archive',churchthemes); ?> | <?php the_time('Y'); ?></h2>

			<?php } ?>

			<div class="post">
				<div class="entry">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="post_excerpt">

        				<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<span class="date"><?php _e('Published',churchthemes); ?> <?php echo the_time("F j, Y") ?></span>

            			<?php the_excerpt(); ?>

            			<span><a href="<?php the_permalink(); ?>" title="Read more" class="underline"><?php _e('Read more',churchthemes); ?></a></span>
					</div>

					<?php endwhile; ?>

				</div> <!-- //.entry -->
				<?php endif; ?>

			</div> <!-- //.post -->

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