<div id="right">

<div class="tabsdiv">
	<h3 class="sidetitl "> Sermons </h3>
	<?php 
		$my_query = new WP_Query('post_type=sermons&showposts=5');
		while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
	?>
	
	<div class="fblock">
		<img class="thumbim" src="<?php $photo=get_post_meta($post->ID, 'wtf_sermon-speaker', true); echo $photo; ?>" width="50" height="50" alt=""/>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<span><?php $verse=get_post_meta($post->ID, 'wtf_sermon-verse', true); echo $verse; ?></span>
		<span><?php echo get_the_term_list( $post->ID, 'speaker', '', ' ', '' ); ?></span>
		<div class="clear"></div>
	</div>
	<?php endwhile; ?>
	
</div>


<div class="tabsdiv">
	<h3 class="sidetitl "> Events </h3>
	<?php 
		$my_query = new WP_Query('post_type=events&showposts=5');
		while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
	?>
	
	<div class="fblock">
	<?php
		if ( has_post_thumbnail() ) { ?>
			<img class="thumbim" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=50&amp;w=50&amp;zc=1" alt=""/>
	<?php } else { ?>
			<img class="thumbim" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" />
	<?php } ?>
		<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<span><?php $eventlocation=get_post_meta($post->ID, 'wtf_event-location', true); echo $eventlocation; ?></span>
		<span><?php $eventdate=get_post_meta($post->ID, 'wtf_event-date', true); echo $eventdate; ?></span>
		<div class="clear"></div>
	</div>
	<?php endwhile; ?>
	
</div>

<?php include (TEMPLATEPATH . '/sponsors.php'); ?>	

<!-- Sidebar widgets -->
<div class="sidebar">
<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
	<?php endif; ?>
</ul>
</div>

</div>