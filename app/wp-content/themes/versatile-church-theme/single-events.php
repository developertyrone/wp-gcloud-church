<?php
get_header();
$meta = get_post_meta(get_the_ID(), 'events_datetime', true );
?>

</section>

<!-- End Header bg -->

<!-- start container -->

<section id="container">

	<section class="container">

    	<!-- start leftcol -->

            <section class="eleven columns single-events" id="leftcol">

            	<!-- start post -->

                <?php while (have_posts()) : the_post(); ?>

                <article class="post" id="event-<?php the_ID(); ?>">

                    <h2 class="page-title"><?php the_title(); ?></h2>

                    	<ul class="single-list">

				<li><strong><?php _e('Event Date: ','framework'); ?></strong><?php echo date('F j, Y',$meta); ?></li>

				<li><strong><?php _E('Time: ','framework'); ?></strong><?php echo date('h:i A',$meta); ?></li> 			<li><strong><?php _e('Location: ','framework'); ?></strong><?php echo get_post_meta($post->ID,'events_location',true); ?></li>

				<li><strong><?php _e('Address: ','framework'); ?></strong><?php echo get_post_meta($post->ID,'events_address',true); ?></li>

			</ul>

                    	<!-- entry -->

                    	<section class="entry">

                        	<?php the_content(); ?>

                    	</section>

                    	<!-- entry -->

                </article>

                <!-- end post -->

                <?php endwhile; ?>

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