<?php get_header(); ?>
</section>
<!-- End Header bg -->
<!-- start container -->
<section id="container">
	<section class="container">
    	<!-- start leftcol -->
            <section class="eleven columns" id="leftcol">
            	<!-- start post -->
                <article class="post" id="post-<?php the_ID(); ?>">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <section class="meta"><?php _e('Published ','framework'); the_time('F j, Y'); _e(' by ','framework'); the_author_posts_link(); ?></section>
                    <!-- entry -->
                    <section class="entry">
                        <?php the_content(); ?>
                    </section>
                    <!-- entry -->
                </article>
                <!-- end post -->
                <?php endwhile; else: ?>
		<article class="post">
                <h2 class="post-title"><?php _e('Error 404 - Not Found', 'framework') ?></h2>
                    <!-- entry -->
                    <section class="entry">
                        <p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                    </section>
                    <!-- entry -->
                </article>
                <!-- end post -->
                <?php endif; ?>
                <?php comments_template('', true); ?>
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