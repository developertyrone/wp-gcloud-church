<!-- Upcoming Events List -->
	<div class="widget">
		<h4><?php _e('Upcoming Events',churchthemes); ?></h4>
		<?php query_posts( array( 'post_type' => 'events', 'post_status' => 'future', 'posts_per_page' => 5, 'order' => 'ASC', 'paged' => get_query_var('paged') ) ); ?>
		<ul>     
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li>
				<span class="list_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span>
			<?php the_time('F jS'); ?> <?php _e('at',churchthemes); ?>  <?php the_time() ?>
			</li>
		<?php endwhile; ?>		
		<?php endif; ?>
		<?php wp_reset_query(); ?> 
	</ul>
	<span class="viewall"><a href="<?php bloginfo('home'); ?>/events/ " class="underline"><?php _e('view all upcoming events',churchthemes); ?></a></span>
</div>
<!-- end feature2 -->

<?php dynamic_sidebar(); ?>