<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>

<!-- start container -->
<div id="container">

	
		<!-- start leftcol -->
		<div id="leftcol">
			<div class="post">
				<h2 class="title"><?php _e('Upcoming Events',churchthemes); ?></h2>
				<div class="entry">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
					<?php endwhile; ?>
			
			<?php endif; ?>
				<?php wp_reset_query(); ?>
<?php query_posts( array( 'post_type' => 'events', 'post_status' => 'future', 'posts_per_page' => 10, 'order' => 'ASC', 'paged' => get_query_var('paged') ) ); ?>
	<!-- start table -->
	<div class="table">
            	<!-- th1 -->
                <div class="th1">
                	<div class="td1">Event</div>
                    <div class="td2">Date</div>
                    <div class="td3">Location</div>
                </div>
                <!-- th1 -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" class="tr1">
                	<div class="td1"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></div>
                    <div class="td2"><?php echo get_the_date('n/j/y'); ?></div>
                    <div class="td3"><?php echo get_post_meta($post->ID, 'events_venue', true); ?></div>
                </div>
                <?php endwhile; ?>		

					<?php endif; ?>
            <div class="clear"></div>
            </div>
            <!-- end table -->
		</div> <!-- //. entry -->
			</div> <!-- //. post -->
			<?php if (function_exists("pagination")) {

   			 pagination($additional_loop->max_num_pages);

				} ?>

		</div>
		<!-- end leftcol -->
		<!-- start rightcol -->
		<div id="rightcol">
			<!-- Media List -->
			<div class="widget">
				<h4><?php _e('Media',churchthemes); ?></h4>
				<?php query_posts( array( 'post_type' => 'sermon_post', 'posts_per_page' => 5, 'order' => 'DESC', 'paged' => get_query_var('paged') ) ); ?>
				<ul>     

      			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li id="post-<?php the_ID(); ?>">
						<span class="list_title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'churchthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span>
						<?php the_time('F d, Y'); ?> - <?php $sermon_filelink= get_post_meta($post->ID, 'sermon_filelink', true);

if ($sermon_filelink) {

?>

						<script type="text/javascript">

						jQuery(function ($) {

						$('#post-<?php the_ID(); ?> .modal').click(function (e) {

							$('#pop-<?php the_ID(); ?>').modal();
						return false;

						});

						});
						</script>

					<div class="player" id="pop-<?php the_ID(); ?>">

					<span class="poptitle"><?php the_title(); ?></span>
						<embed type="application/x-shockwave-flash" src="http://www.google.com/reader/ui/3523697345-audio-player.swf" quality="best" flashvars="audioUrl=<?php echo get_post_meta($post->ID, 'sermon_filelink', true); ?>" width="500" height="27"></embed>            
				</div>
				<span><a href="<?php the_permalink(); ?>" title="Listen" class="underline modal"><?php _e('Listen',churchthemes); ?></a></span>

			<?php } else { ?>
			<p style="display:none;"></p>
			<?php } ?>
			</li>
			<?php endwhile; ?>		
			<?php endif; ?>
			<?php wp_reset_query(); ?> 
		</ul>
		<span class="viewall"><a href="<?php bloginfo('home'); ?>/media/" class="underline"><?php _e('view media archives',churchthemes); ?></a></span>

    </div>
	<!-- end feature2 -->
	<?php dynamic_sidebar(); ?>

	</div>
	<!-- end rightcol -->

<div class="clear"></div>
    </div>
    <!-- end container -->

<?php get_footer(); ?>