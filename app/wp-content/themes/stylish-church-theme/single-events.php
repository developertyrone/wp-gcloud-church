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


<p><span class="display-block"><strong><?php _e('Event Date: ',churchthemes); ?></strong> <?php echo get_the_date('F j, Y'); ?></span>


                <span class="display-block"><strong><?php _e('Time:',churchthemes); ?></strong> <?php the_time() ?></span>


                <strong><?php _e('Location:',churchthemes); ?></strong> <?php echo get_post_meta($post->ID, 'events_venue', true); ?></p>


				<div class="entry">


					





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