<?php get_header(); ?>

<!-- start container -->
<div id="container">

		<!-- start leftcol -->
		<div id="leftcol">
			<div class="post">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<h2 class="title"><?php the_title(); ?></h2>

				<div class="entry" id="post-<?php the_ID(); ?>">
<span style="display:block; padding-bottom:3px;"><strong><?php _e('Date: ',churchthemes); ?></strong><?php echo get_the_date('F n, Y'); ?></span>
<span style="display:block; padding-bottom:3px;"><strong><?php _e('Speaker: ',churchthemes); ?></strong><?php echo get_post_meta($post->ID, 'sermon_speaker', true); ?></span>
					
					<div class="clear"></div>
			<div style="display:block; padding-bottom:20px;">
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
				<strong><a href="<?php the_permalink(); ?>" title="Listen" class="underline modal"><?php _e('Listen',churchthemes); ?></a></strong>
				<?php } else { ?>

				<p style="display:none;"></p>

				<?php } ?>
				</div>
<?php the_content(); ?>
				<div class="clear"></div>
			</div>

			<?php endwhile; ?>
			 <?php endif; ?>
		</div>

<?php comments_template(); ?>
	</div>
	<!-- end leftcol -->

	<!-- start rightcol -->
	<div id="rightcol">
		<?php get_sidebar(); ?>
	</div>
	<!-- end rightcol -->
	<div class="clear"></div>

</div>
<!-- end container -->

<?php get_footer(); ?>