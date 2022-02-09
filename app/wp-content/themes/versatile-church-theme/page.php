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
                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <!-- entry -->
                    <section class="entry">
                        <?php the_content(); ?>
                    </section>
                    <!-- entry -->
                </article>
                <!-- end post -->
                <?php endwhile; else: ?>
		<article class="post">
                <h2 class="page-title"><?php _e('Error 404 - Not Found', 'framework') ?></h2>
                    <!-- entry -->
                    <section class="entry">
                        <p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                    </section>
                    <!-- entry -->
                </article>
                <!-- end post -->
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