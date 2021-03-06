<?php
/**
 * Adds footer structures.
 *
 * @package 		Theme Horse
 * @subpackage 	Clean_Retina
 * @since 			Clean Retina 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/clean-retina
 */

add_action( 'cleanretina_footer', 'cleanretina_open_wrapper_div', 5 );
/**
 * Opens the wrapper div.
 */
function cleanretina_open_wrapper_div() {
	echo '<div class="wrapper">';
}

/****************************************************************************************/

add_action( 'cleanretina_footer', 'cleanretina_footer_widget_area', 10 );
/** 
 * Displays the footer widgets
 */
function cleanretina_footer_widget_area() {
	if( is_active_sidebar( 'cleanretina_footer_sidebar' ) ) {
		?>
		<div class="widget-area clearfix">
			<?php
			if ( is_active_sidebar( 'cleanretina_footer_sidebar' ) ) :
				dynamic_sidebar( 'cleanretina_footer_sidebar' );
			endif;
			?>
      </div><!-- .widget-area -->
      <hr />
      <?php
	}
}

/****************************************************************************************/

add_action( 'cleanretina_footer', 'cleanretina_open_sitegenerator_div', 15 );
/**
 * Opens the wrapper div.
 */
function cleanretina_open_sitegenerator_div() {
	echo '<div id="site-generator" class="clearfix">';
}

/****************************************************************************************/

add_action( 'cleanretina_footer', 'cleanretina_socialnetworks', 20 );

/****************************************************************************************/

add_action( 'cleanretina_footer', 'cleanretina_footer_info', 25 );
/**
 * function to show the footer info, copyright information
 */
function cleanretina_footer_info() {         
   $output = '<div class="copyright">'.__( 'Copyright &copy;', 'clean-retina' ).' '.cleanretina_the_year().' ' .cleanretina_site_link().' | ' . cleanretina_themehorse_privacy() .__( 'Theme by:', 'clean-retina' ).' '.cleanretina_themehorse_link().' | '.' '.__( 'Powered by:', 'clean-retina' ).' '.cleanretina_wp_link() .'</div><!-- .copyright -->';
   echo $output;
}

/****************************************************************************************/

add_action( 'cleanretina_footer', 'cleanretina_close_sitegenerator_div', 30 );
/**
 * Closes the wrapper div.
 */
function cleanretina_close_sitegenerator_div() {
	echo '</div><!-- #site-generator -->';
}

/****************************************************************************************/

add_action( 'cleanretina_footer', 'cleanretina_close_wrapper_div', 35 );
/**
 * Closes the wrapper div.
 */
function cleanretina_close_wrapper_div() {
	echo '</div><!-- .wrapper -->';
}

add_action( 'cleanretina_footer', 'cleanretina_backtotop_html', 40 );
/**
 * Shows the back to top icon to go to top.
 */
function cleanretina_backtotop_html() {
	echo '<div class="back-to-top"><a href="#branding"></a></div>';
}

?>