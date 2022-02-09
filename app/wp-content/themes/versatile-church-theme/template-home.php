<?php

/*

Template Name: Home

*/

?>

<?php get_header(); ?>

<!-- start showcase -->

<section id="showcase">

<section class="container">

<section class="columns sixteen">

<script type="text/javascript">

		jQuery(window).load(function() { jQuery('#slider').nivoSlider({ effect: '<?php echo get_option('church_slideshow_effect'); ?>', slices: 5, boxCols: 5, boxRows: 5, animSpeed: 700, directionNavHide:false, controlNav: true, pauseTime: <?php if (get_option('church_slideshow_pausetime') != "") { echo get_option('church_slideshow_pausetime'); } else { echo 7000; } ?> }); });

		</script>

        <section class="slider-wrapper theme-default">

            <section id="slider" class="nivoSlider">

             <?php $query = new WP_Query();

                      $query->query('post_type=slide&posts_per_page=-1');

                      while ($query->have_posts()) : $query->the_post(); ?>

                <?php if ( get_post_meta($post->ID, 'slide_slink', true) ) { ?>



					<?php if ( has_post_thumbnail()) { ?>



   	      					<a href="<?php echo get_post_meta($post->ID, 'slide_slink', true); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('slide-background'); ?></a>



                    			<?php } ?>



					<?php } else { ?>



						<?php if ( has_post_thumbnail()) { ?>



							<?php the_post_thumbnail('slide-background'); ?>



						<?php } ?>



					<?php } ?>

                <?php endwhile; wp_reset_query(); ?>

            </section>

        </section>

	</section>

</section>

</section>

<!-- end showcase -->

</section>

<!-- End Header bg -->

<!-- start container -->

<section id="container" class="homepage-widgets">

	<section class="container">

            	<?php dynamic_sidebar('HomePage'); ?>

  		<div class="clear"></div>

	</section>

</section>

<!-- end container -->

<?php get_footer(); ?>