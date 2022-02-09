<?php
/*
Template Name: Media
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
                    <h2 class="page-title"><?php _e('Recent Sermons', framework); ?></h2>
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="entry">
				<?php the_content(); ?>
			</section>
			<?php endwhile; ?>
			<?php endif; ?>
		    <?php //wp_reset_query(); ?>
                    <ul class="items-list">
                        <?php query_posts( array( 'post_type' => 'sermon', 'order' => 'DESC', 'paged' => get_query_var('paged') ) ); ?>

                 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <li><strong><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a></strong><br /><?php _e(' Date: ','framework'); ?><?php the_time('F j, Y'); ?><br /><?php _e(' Speaker: ','framework'); echo get_post_meta($post->ID,'media_speaker',true); ?><br /><?php echo get_the_term_list( $post->ID, 'media_tags', 'Tags: ', ', ', '' ); ?></li>
                            <?php endwhile; endif; ?>
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
                <?php dynamic_sidebar('Sermons Page Sidebar'); ?>
            </aside>
            <!-- end rightcol -->
		<div class="clear"></div>
  	</section>
</section>
<!-- end container -->
<?php get_footer(); ?>