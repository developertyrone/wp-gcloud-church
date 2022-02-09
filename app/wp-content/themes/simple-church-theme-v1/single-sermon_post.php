<?php get_header(); ?>

<!-- start container -->
<div id="container">
<div class="box">
	<div id="content">
		<!-- start leftcol -->
		<div id="leftcol">
			<div class="post single-media">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<h2 class="title"><?php the_title(); ?></h2>

				<div class="entry" id="post-<?php the_ID(); ?>">
					<span><?php echo get_post_meta($post->ID, 'sermon_speaker', true); ?> <span class="gray"><?php the_time('F d, Y'); ?></span></span>
					<div class="clear"></div>
					<p>
					<?php $sermon_filelink= get_post_meta($post->ID, 'sermon_filelink', true);

					if ($sermon_filelink) {

						?>
<script type="text/javascript">
jQuery(function ($) {

$('#post-<?php the_ID(); ?> .modal').click(function (e) {

$('#<?php the_ID(); ?>').modal();

return false;

});
});
</script>

					<div class="player" id="<?php the_ID(); ?>">
					<span class="poptitle"><?php the_title(); ?></span>
					<embed type="application/x-shockwave-flash" src="http://www.google.com/reader/ui/3523697345-audio-player.swf" quality="best" flashvars="audioUrl=<?php echo get_post_meta($post->ID, 'sermon_filelink', true); ?>" width="500" height="27"></embed>            

				</div>
				<span><a href="<?php the_permalink(); ?>" title="Listen" class="underline modal"><?php _e('Listen',churchthemes); ?></a></span>
				<?php } else { ?>

				<p style="display:none;"></p>

				<?php } ?>
				</p><?php the_content(); ?>
				<div class="clear"></div>
			</div>

			<?php endwhile; ?>
			 <?php endif; ?>
		</div>
	</div>
	<!-- end leftcol -->

	<!-- start rightcol -->
	<div id="rightcol">
		<?php get_sidebar(); ?>
	</div>
	<!-- end rightcol -->
	<div class="clear"></div>

</div>	
<div class="clear"></div>
</div>
</div>
<!-- end container -->

<?php get_footer(); ?>