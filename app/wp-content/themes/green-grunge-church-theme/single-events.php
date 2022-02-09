<?php

/**

 * The Template for displaying all single events posts.

 */

get_header(); ?>



<!-- start container -->

<div id="container">



		<!-- start leftcol -->

		<div id="leftcol">

			<div class="post">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h2 class="title"><?php the_title(); ?></h2>

				<div class="entry">

					<span style="display:block; padding-bottom:3px;"><strong><?php _e('Event Date: ',churchthemes); ?></strong><?php echo get_the_date('n/j/y'); ?> <?php _e('at',churchthemes); ?>  <?php the_time() ?></span>

					<span style="display:block; padding-bottom:20px;"><strong><?php _e('Location: ',churchthemes); ?></strong><?php echo get_post_meta($post->ID, 'events_venue', true); ?></span>



					<?php the_content(); ?>

				</div> <!-- //. entry -->

				<?php endwhile; ?>

			</div> <!-- //. post -->

			<?php endif; ?>





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



<?php get_footer(); ?>