<?php

/*

Template Name: Media

*/

?>



<?php get_header(); ?>



<!-- start container -->

<div id="container">



	

	<!-- start leftcol -->

	<div id="leftcol">

		<div class="post">

			<h2 class="title"><?php _e('Media',churchthemes); ?></h2>

			<div class="entry">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

					<?php endwhile; ?>

			

			<?php endif; ?>



				<?php wp_reset_query(); ?>

</div> <!-- //. entry -->



<?php query_posts( array( 'post_type' => 'sermon_post', 'posts_per_page' => 10, 'order' => 'DESC', 'paged' => get_query_var('paged') ) ); ?>

		

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="entry listing" id="post-<?php the_ID(); ?>">

                    <h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

                    <p><span class="display-block"><?php _e('By', churchthemes); ?> <?php echo get_post_meta($post->ID, 'sermon_speaker', true); ?></span> <?php echo get_the_date('F j, Y'); ?></p>

			<p><?php  $excerpt = get_the_excerpt();

  				echo string_limit_words($excerpt,40);

			?></p>

<?php $sermon_filelink= get_post_meta($post->ID, 'sermon_filelink', true);



					if ($sermon_filelink) {



				?>



				<script type="text/javascript">



				jQuery(function ($) {



				$('#post-<?php the_ID(); ?> .modal').click(function (e) {



					$('#<?php the_ID(); ?>').modal();



				return false;

				});



				});

				</script>



				<div class="player" id="<?php the_ID(); ?>">

				<span class="poptitle"><?php the_title(); ?></span>



				<embed type="application/x-shockwave-flash" src="http://www.google.com/reader/ui/3523697345-audio-player.swf" quality="best" flashvars="audioUrl=<?php echo get_post_meta($post->ID, 'sermon_filelink', true); ?>" width="500" height="27"></embed>            

			</div>

			<a href="<?php the_permalink(); ?>" class="link1 left modal"><strong><?php _e('listen to the message', churchthemes); ?></strong></a>

<?php } else { ?>

			<p style="display:none;"></p>

			<?php } ?>

                    <div class="clear"></div>

                </div>

                    <?php endwhile; ?>

			

			<?php endif; ?>

		

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

<!-- end container -->

<div class="clear"></div>

</div>

</div>

<!-- end wrap -->

<?php get_footer(); ?>