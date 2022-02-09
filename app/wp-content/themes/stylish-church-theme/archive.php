<?php get_header(); ?>


<!-- start container -->
<div id="container">

			<!-- start leftcol -->
			<div id="leftcol">
<div class="post">
			<?php if (is_category()) { ?>
			<h2 class="title"><?php _e('Entries Tagged as',churchthemes); ?> &lsquo;<?php echo single_cat_title(); ?>&rsquo;</h2>        

			<?php } elseif (is_day()) { ?>
			<h2 class="title"><?php _e('Archive',churchthemes); ?> | <?php the_time('F jS, Y'); ?></h2>
			
			<?php } elseif (is_month()) { ?>
			<h2 class="title"><?php _e('Archive',churchthemes); ?> | <?php the_time('F, Y'); ?></h2>

			<?php } elseif (is_year()) { ?>
			<h2 class="title"><?php _e('Archive',churchthemes); ?> | <?php the_time('Y'); ?></h2>

			<?php } ?>

			
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="entry listing" id="post-<?php the_ID(); ?>">
                    <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
        				
					<span class="date"><?php _e('Published',churchthemes); ?> <?php echo the_time("F j, Y") ?></span>

            			<?php the_excerpt(); ?>
<a href="<?php the_permalink(); ?>" class="link1 link2 left"><strong><?php _e('read more',churchthemes); ?></strong></a>
            			<div class="clear"></div>
					</div>

					<?php endwhile; ?>

				
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
<!-- end container -->
<div class="clear"></div>
</div>
</div>
<!-- end wrap -->
<?php get_footer(); ?>