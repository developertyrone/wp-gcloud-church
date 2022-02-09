<?php



/* These are functions specific to the included option settings and this theme */





/*-----------------------------------------------------------------------------------*/

/* Output Custom CSS from theme options

/*-----------------------------------------------------------------------------------*/



function church_head_css() {



		$shortname =  get_option('church_shortname'); 

		$output = '';

		

		$custom_css = get_option('church_custom_css');

		

		if ($custom_css <> '') {

			$output .= $custom_css . "\n";

		}

		

		// Output styles

		if ($output <> '') {

			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";

			echo $output;

		}

	

}



add_action('wp_head', 'church_head_css');





/*-----------------------------------------------------------------------------------*/

/* Add Body Classes for Layout

/*-----------------------------------------------------------------------------------*/



add_filter('body_class','church_body_class');

 

function church_body_class($classes) {

	$shortname = get_option('church_shortname');

	$layout = get_option($shortname .'_layout');

	if ($layout == '') {

		$layout = 'layout-2cr';

	}

	$classes[] = $layout;

	return $classes;

}





/*-----------------------------------------------------------------------------------*/

/* Add Favicon

/*-----------------------------------------------------------------------------------*/



function church_favicon() {

	$shortname = get_option('church_shortname');

	if (get_option($shortname . '_custom_favicon') != '') {

	echo '<link rel="shortcut icon" href="'. get_option('church_custom_favicon') .'"/>'."\n";

	}

	else { ?>

	<link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory') ?>/admin/images/favicon.ico" />

	<?php }

}



add_action('wp_head', 'church_favicon');





/*-----------------------------------------------------------------------------------*/

/* Show analytics code in footer */

/*-----------------------------------------------------------------------------------*/



function church_analytics(){

	$shortname =  get_option('church_shortname');

	$output = get_option($shortname . '_google_analytics');

	if ( $output <> "" ) 

		echo stripslashes($output) . "\n";

}

add_action('wp_footer','church_analytics');






/*-----------------------------------------------------------------------------------*/

/* ADDED V1.1 - Check video url functions

/*-----------------------------------------------------------------------------------*/



function church_video($postid) {

	

	$video_url = get_post_meta($postid, 'church_video_url', true);

	$height = get_post_meta($postid, 'church_video_height', true);

	$embeded_code = get_post_meta($postid, 'church_embed_code', true);

	

	if($height == '')

		$height = 500;



	if(trim($embeded_code) == '') 

	{

		

		if(preg_match('/youtube/', $video_url)) 

		{

			

			if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches))

			{

				$output = '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="700" height="'.$height.'" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowFullScreen></iframe>';

			}

			else 

			{

				$output = __('Sorry that seems to be an invalid <strong>YouTube</strong> URL. Please check it again.', 'framework');

			}
		}
		elseif(preg_match('/vimeo/', $video_url)) 
		{
			if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))
			{

				$output = '<iframe src="http://player.vimeo.com/video/'.$matches[1].'" width="700" height="'.$height.'" frameborder="0"></iframe>';

			}
			else 
			{
				$output = __('Sorry that seems to be an invalid <strong>Vimeo</strong> URL. Please check it again. Make sure there is a string of numbers at the end.', 'framework');

			}
		}
		else 
		{
			$output = __('Sorry that is an invalid YouTube or Vimeo URL.', 'framework');
		}
		echo $output;
	}
	else
	{
		echo stripslashes(htmlspecialchars_decode($embeded_code));
	}

}

?>