<?php get_header(); ?>
</section>
<!-- End Header bg -->
<!-- start container -->
<section id="container">
	<section class="container">
    	<!-- start leftcol -->
            <section class="eleven columns" id="leftcol">
            	<!-- start post -->
                <?php while (have_posts()) : the_post(); ?>
                <article class="post" id="sermon-<?php the_ID(); ?>">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <section class="meta"><?php _E('By ','framework');the_author_posts_link(); _e(' on ','framework'); the_time('F j, Y'); ?></section>
                    <?php if ( get_post_meta($post->ID, 'media_vurl', true) ) : ?>
                    <section class="videocol">
                    <?php $string = get_post_meta($post->ID,'media_vurl',true);
					$vim = substr($string, 0, 12);
					if($vim=='http://www.y'){
					$pattern = '#v=([^&]+)#i';
					if (preg_match($pattern, $string, $match))
					{
       					 $id = $match[1];
					} ?>
                    	<iframe width="425" height="349" src="http://www.youtube.com/embed/<?php echo $id; ?>" frameborder="0" allowfullscreen></iframe>
                    <?php } if($vim=='http://vimeo'){
                    $vimeolink = str_replace("http://vimeo.com/", "", $string);
					echo '<iframe src="http://player.vimeo.com/video/'; ?> <?php echo $vimeolink; ?> <?php echo '"width="425" height="349" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; } ?>
                    </section>
                    <?php endif;  if ( get_post_meta($post->ID, 'media_aurl', true) ) : ?>
                    <section class="audiocol">
                    	<audio class="audio-player" src="<?php echo get_post_meta($post->ID,'media_aurl',true); ?>" type="audio/mp3" controls="controls"></audio>
                    </section>
                    <?php endif; ?>
                    <!-- entry -->
                    <section class="entry">
                    	<div class="meta"><?php echo get_the_term_list( $post->ID, 'media_tags', 'Tags: ', ', ', '' ); ?></div>
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