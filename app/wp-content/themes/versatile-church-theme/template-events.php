<?php
/*
Template Name: Events
*/
?>
<?php get_header(); ?>
</section>
<!-- End Header bg -->
<!-- start container -->
<section id="container">
	<section class="container">
    	<!-- start leftcol -->
            <section class="eleven columns" id="leftcol">
            	<!-- start post -->
                <article class="post">
                    <h2 class="page-title"><?php _e('Upcoming Events', framework); ?></h2>
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="entry">
				<?php the_content(); ?>
			</section>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php //wp_reset_query(); ?>
                    <ul class="items-list">
                        <?php $query = new WP_Query();
                       query_posts(array('post_type' => 'events','meta_key' => 'events_datetime','orderby' => 'meta_value','order' => 'ASC', 'paged' => get_query_var('paged')));
                      if (have_posts()) : while (have_posts()) : the_post();  $sj = date('U'); $ss = get_post_meta($post->ID,'events_datetime',true); if($ss>$sj){  ?>
                            <li><strong><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a></strong><br /> <strong><?php _e('Date: ','framework'); ?></strong><?php echo date('F j, Y',$ss); ?><br /> <strong><?php _E('Time: ','framework'); ?></strong><?php echo date('h:i A',$ss); ?><br /> <strong><?php _e('Location: ','framework'); ?></strong><?php echo get_post_meta($post->ID,'events_location',true); ?></li>
                        <?php } endwhile; endif; ?>
                        </ul>
                </article>
                <!-- end post -->
                <!-- pagination -->
            	<section class="pagination">
            		<div class="nav-next"><?php next_posts_link(__('Next', 'framework')) ?></div>
			<div class="nav-previous"><?php previous_posts_link(__('Previous', 'framework')) ?></div>
            		<div class="clear"></div>
                </section>
            	<!-- pagination -->
		<?php wp_reset_query(); ?>
            </section>
            <!-- end leftcol -->
            <!-- start rightcol -->
            <aside class="five columns" id="rightcol">
                <?php dynamic_sidebar('Events Page Sidebar'); ?>
            </aside>
            <!-- end rightcol -->
		<div class="clear"></div>
  	</section>
</section>
<!-- end container -->
<?php get_footer(); ?>