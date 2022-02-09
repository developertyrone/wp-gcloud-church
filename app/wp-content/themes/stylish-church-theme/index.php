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

		

 						<div class="entry listing" id="post-<?php the_ID(); ?>">


                    <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>


        				


					<span class="date"><?php _e('Published',churchthemes); ?> <?php echo the_time("F j, Y") ?></span>





            			<?php the_excerpt(); ?>


<a href="<?php the_permalink(); ?>" class="link1 link2 left"><strong><?php _e('read more',churchthemes); ?></strong></a>


            			<div class="clear"></div>


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