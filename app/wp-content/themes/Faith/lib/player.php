	<div class="media-frame">
		<?php $audio = get_post_meta($post->ID, 'wtf_sermon-audio', $single = true); ?>
		<div id='mediaspace-<?php the_ID(); ?>'>This text will be replaced with audio  if available.</div>
 		<script type='text/javascript'>
			jwplayer('mediaspace-<?php the_ID(); ?>').setup({
			'flashplayer': '<?php bloginfo('template_directory'); ?>/lib/player.swf',
			'file': '<?php echo $audio; ?>',
			'backcolor': '111111',
			'frontcolor': 'cccccc',
			'lightcolor': '66cc00',
			'playlistsize': '200',
			'skin': '<?php bloginfo('template_directory'); ?>/lib/stylish_slim.swf',
			'playlist': 'bottom',
			'controlbar': 'bottom',
			'width': '540',
			'height': '32'
			});
		</script>
	</div>