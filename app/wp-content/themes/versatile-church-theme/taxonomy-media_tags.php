<?php
/*
* Sermon Posts taxonomy archive
*/
get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
</section>
<!-- End Header bg -->
<!-- start container -->
<section id="container">
	<section class="container">
    	<!-- start leftcol -->
            <section class="eleven columns" id="leftcol">
            	<!-- start post -->
                <article class="post">

	    	 		<h2 class="page-title">Sermons tagged as "<?php echo apply_filters( 'the_title', $term->name ); ?>"</h2>

	    	<ul class="items-list">
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