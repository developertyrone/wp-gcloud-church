<?php get_header(); ?>
</div>
<!-- End Header bg -->
<!-- start container -->
<div id="container">
	<div class="container">
    	<!-- start leftcol -->
            <div class="eleven columns results" id="leftcol">	
			<h3 class="result-heading"><?php _e("Search Results for &#8220;$s&#8221;", 'framework') ?></h3>
	 	<!-- post -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          	<div class="post listing" id="post-<?php the_ID(); ?>">
                    	<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
              		<div class="meta"><?php _e('Published ','framework'); the_time('F j, Y'); _e(' by ','framework'); the_author_posts_link(); ?></div>
                </div>
                <!-- post -->
                <?php endwhile; ?>
                <!-- pagination -->
            	<div class="pagination">
            		<div class="nav-next"><?php next_posts_link(__('Older Posts', 'framework')) ?></div>
			<div class="nav-previous"><?php previous_posts_link(__('Newer Posts', 'framework')) ?></div>
            		<div class="clear"></div>
                </div>
            	<!-- pagination -->
                <?php else: ?>
                <div class="post">
                    <h2 class="page-title"><?php _e('No Results Found', 'framework') ?></h2>
                    <div class="entry">
                    	<p><?php _e("Sorry, but you are looking for something that isn't here. Try another search", "framework") ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- end leftcol -->
            <!-- start rightcol -->
            <div class="five columns" id="rightcol">
                <?php get_sidebar(); ?>
            </div>
            <!-- end rightcol -->
		<div class="clear"></div>
  	</div>
</div>
<!-- end container -->
<?php get_footer(); ?>