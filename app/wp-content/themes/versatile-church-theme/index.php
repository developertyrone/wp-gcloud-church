<?php get_header(); ?>
</section>
<!-- End Header bg -->
<!-- start container -->
<section id="container">
	<section class="container">
    	<!-- start leftcol -->
            <section class="eleven columns" id="leftcol">
            	<!-- post -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          		<article class="post listing" id="post-<?php the_ID(); ?>">
                    	<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
              		<section class="meta"><?php _e('Published ','framework'); the_time('F j, Y'); _e(' by ','framework'); the_author_posts_link(); ?></section>
            		<?php if((function_exists('has_post_thumbnail'))&&(has_post_thumbnail())){ ?>
			<section class="thumb">
				<?php the_post_thumbnail(); ?>
			</section>
			<?php } ?>
                    	<section class="entry">
                    		<?php the_excerpt(); ?>
                    	</section>
                </article>
                <!-- post -->
                <?php endwhile; ?>
                <!-- pagination -->
            	<section class="pagination">
            		<div class="nav-next"><?php next_posts_link(__('Older Posts', 'framework')) ?></div>
			<div class="nav-previous"><?php previous_posts_link(__('Newer Posts', 'framework')) ?></div>
            		<div class="clear"></div>
                </section >
            	<!-- pagination -->
                <?php else: ?>
                <article class="post">
                    <h2 class="page-title"><?php _e('Error 404 - Not Found', 'framework') ?></h2>
                    <section class="entry">
                    	<p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                    </section>
                </article>
                <?php endif; ?>
            </section>
            <!-- end leftcol -->
            <!-- start rightcol -->
            <aside class="five columns" id="rightcol">
                <?php get_sidebar(); ?>
            </aside>
            <!-- end rightcol -->
		<div class="clear"></div>
  	</section>
</section>
<!-- end container -->
<?php get_footer(); ?>