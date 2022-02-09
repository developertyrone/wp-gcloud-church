<?php

/*

Template Name: Home

*/

?>



<?php get_header(); ?>



<?php if (get_option('church_slideshow') == 'Yes') { ?>



<!-- start showcase -->



    <div id="showcase">



    <script type="text/javascript">

		jQuery(window).load(function() { jQuery('#slider').nivoSlider({ effect: '<?php echo get_option('church_slideshow_effect'); ?>', slices: 5, boxCols: 5, boxRows: 5, animSpeed: 700, controlNav: false, pauseTime: <?php if (get_option('church_slideshow_pausetime') != "") { echo get_option('church_slideshow_pausetime'); } else { echo 7000; } ?> }); });



		</script>

    	 <div class="slider-wrapper theme-default">



            



            <div id="slider">



                <?php



				$query = new WP_Query();



				$query->query('post_type=slide');



				$post_count = $query->post_count;



				$count = 0;



				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); $captions[] = '<h2>'.get_the_title($post->ID).'</h2><p>'.get_the_content().'</p>'; $thumb_attrs = array( 'title' => '#caption'.$count );



				?>



				<?php if ( get_post_meta($post->ID, 'slide_link', true) ) { ?>



                



				<?php if ( has_post_thumbnail()) { ?>



				<a href="<?php echo get_post_meta($post->ID, 'slide_link', true); ?>" title="<?php the_title(); ?>" class="imagelink"><?php the_post_thumbnail('slide-background', $thumb_attrs); ?></a>



				<?php } ?>







				<?php } else { ?>







					<?php if ( has_post_thumbnail()) { ?>







					<?php the_post_thumbnail('slide-background', $thumb_attrs); ?>



					<?php } ?>







					<?php } ?>







					<?php $count++; endwhile; endif; ?>



            </div>



            



        </div>



    </div>



    <!-- end showcase -->



 



	<?php } ?>



	<!-- start container -->



    <div id="container" class="homepage">



    	<!-- start feature1 -->



    	<div class="feature1">



    		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



			<h2><?php _e('About Us',churchthemes); ?></h2>



			<?php the_content(); ?>







				<?php endwhile; ?>







				<?php endif; ?>



    	</div>



    	<!-- end feature1 -->



        <!-- start feature2 -->



    	<div class="feature1 in_width">



    		<h2><?php _e('Upcoming Events',churchthemes); ?></h2>







				<?php query_posts( array( 'post_type' => 'events', 'post_status' => 'future', 'posts_per_page' => 5, 'order' => 'ASC', 'paged' => get_query_var('paged') ) ); ?>



				<ul>     



					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



					<li>



						<span class="list_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span>



						<?php the_time('F jS'); ?> at  <?php the_time() ?>



					</li>







					<?php endwhile; ?>		



					<?php endif; ?>







					<?php wp_reset_query(); ?> 







				</ul>



<span class="biglink"><a href="<?php bloginfo('home'); ?>/events/" title="view all upcoming events" class="green"><img src="<?php bloginfo('template_directory'); ?>/images/ico_calender.png" alt="Calender" /> <span class="small"><?php _e('view all',churchthemes); ?></span> <strong><?php _e('upcoming events',churchthemes); ?></strong></a></span>



    	</div>



    	<!-- end feature2 -->



    	<!-- start feature3 -->



    	<div class="feature1 last in_width">



    		<h2><?php _e('Recent Messages',churchthemes); ?></h2>



				<?php query_posts( array( 'post_type' => 'sermon_post', 'posts_per_page' => 5, 'order' => 'DESC', 'paged' => get_query_var('paged') ) ); ?>







       			<ul>     



				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



					<li id="post-<?php the_ID(); ?>">



						<span class="list_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span>



						<?php the_time('F j, Y'); ?> - <?php $sermon_filelink= get_post_meta($post->ID, 'sermon_filelink', true);







						if ($sermon_filelink) {







							?>







						<script type="text/javascript">

							jQuery(function ($) {



						$('#post-<?php the_ID(); ?> .modal').click(function (e) {



						$('#pop-<?php the_ID(); ?>').modal();



						return false;

						});



					});



				</script>







				<div class="player" id="pop-<?php the_ID(); ?>">



				<span class="poptitle"><?php the_title(); ?></span>



				<embed type="application/x-shockwave-flash" src="http://www.google.com/reader/ui/3523697345-audio-player.swf" quality="best" flashvars="audioUrl=<?php echo get_post_meta($post->ID, 'sermon_filelink', true); ?>" width="500" height="27"></embed>            







				</div>



				<span><a href="<?php the_permalink(); ?>" title="Listen" class="underline modal"><?php _e('listen',churchthemes); ?></a></span>







						<?php } else { ?>



					<p style="display:none;"></p>



					<?php } ?>



				</li>



				<?php endwhile; ?>		



				<?php endif; ?>



				<?php wp_reset_query(); ?> 







        	</ul>

<span class="biglink"><a href="<?php bloginfo('home'); ?>/media/" title="browse the message archives" class="green"><img src="<?php bloginfo('template_directory'); ?>/images/ico_headphone.png" alt="Listen" /> <span class="small"><?php _e('browse the',churchthemes); ?></span> <strong><?php _e('message archives',churchthemes); ?></strong></a></span>

			



    	</div>



    	<!-- end feature3 -->



    <div class="clear"></div>



    </div>



    <!-- end container -->



<div class="clear"></div>

</div>

</div>

<!-- end wrap -->	



<?php get_footer(); ?>