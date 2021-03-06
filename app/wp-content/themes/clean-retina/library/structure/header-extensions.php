<?php
/**
 * Adds header structures.
 *
 * @package 		Theme Horse
 * @subpackage 	Clean_Retina
 * @since 			Clean Retina 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/clean-retina
 */

/****************************************************************************************/

add_action( 'cleanretina_title', 'cleanretina_add_meta', 5 );
/**
 * Add meta tags.
 */ 
function cleanretina_add_meta() {
?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width">
<?php
}

/****************************************************************************************/

add_action( 'cleanretina_links', 'cleanretina_add_links', 10 );
/**
 * Adding link to stylesheet file
 *
 * @uses get_stylesheet_uri()
 */
function cleanretina_add_links() {
?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
<?php
}

/****************************************************************************************/

add_action( 'cleanretina_header', 'cleanretina_headerdetails', 10 );
/**
 * Shows Header Part Content
 *
 * Shows the site logo, title, description, searchbar, social icons etc.
 */
function cleanretina_headerdetails() {	
?>
	<?php
		global $options, $array_of_default_settings;
		$options = wp_parse_args(  get_option( 'cleanretina_theme_options', array() ),  cleanretina_get_option_defaults());

   	$elements = array();
		$elements = array( 	$options[ 'social_facebook' ], 
									$options[ 'social_twitter' ],
									$options[ 'social_googleplus' ],
									$options[ 'social_linkedin' ],
									$options[ 'social_pinterest' ],
									$options[ 'social_youtube' ],
									$options[ 'social_vimeo' ],
									$options[ 'social_flickr' ],
									$options[ 'social_tumblr' ],
									$options[ 'social_myspace' ],
									$options[ 'social_rss' ]
							 	);	

		$flag = 0;
		if( !empty( $elements ) ) {
			foreach( $elements as $option) {
				if( !empty( $option ) ) {
					$flag = 1;
				}
				else {
					$flag = 0;
				}
				if( 1 == $flag ) {
					break;
				}
			}
		}
	?>

	<div class="wrapper clearfix">
		<div class="hgroup-wrap clearfix">
			<div class="hgroup-right">
			<?php 
				if( 0 == $options[ 'hide_header_searchform' ] || 1 == $flag ) {
					cleanretina_socialnetworks( $flag );
					if( 0 == $options[ 'hide_header_searchform' ] ) get_search_form();
				} ?>
				<button class="menu-toggle"><?php _e('Responsive Menu','clean-retina'); ?></button>
			</div><!-- .hgroup-right -->	

			<div id="site-logo" class="clearfix">
				<?php if(is_home() || is_archive() || is_search() || is_page_template( 'page-template-corporate.php' )){?>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php } else { ?>
				<h3 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
				<h4 id="site-description"><?php bloginfo( 'description' ); ?></h4>
				<?php } ?>
			</div><!-- #site-logo -->

			<?php $header_image = get_header_image();
			if( !empty( $header_image ) ) :?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo $header_image; ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
			<?php endif; ?>			
		</div><!-- .hgroup-wrap -->		
		<?php
			if ( has_nav_menu( 'primary' ) ) { 
				$args = array(
					'theme_location'    => 'primary',
					'container'         => '',
					'items_wrap'        => '<ul class="root">%3$s</ul>' 
				);
				echo '<nav id="access" class="clearfix">';
					wp_nav_menu( $args );
				echo '</nav><!-- #access -->';
			}
			else {
				echo '<nav id="access" class="clearfix">';
					wp_page_menu( array( 'menu_class'  => 'root' ) );
				echo '</nav><!-- #access -->';
			}
		?> 		
 		<?php	
   		if( 'above-slider' == $options[ 'slogan_position' ] &&  ( is_home() || is_front_page() ) ) 
   			if( function_exists( 'cleanretina_home_slogan' ) )
   				cleanretina_home_slogan(); 
   	?>
   	<?php

   		if( is_home() || is_front_page() ) {
   			if( 0 == $options[ 'disable_slider' ] ) {
   				if( function_exists( 'cleanretina_pass_cycle_parameters' ) ) 
	   				cleanretina_pass_cycle_parameters();
	   			if( function_exists( 'cleanretina_featured_post_slider' ) ) 
	   				cleanretina_featured_post_slider();
	   		}
   		}
   		else {
   			if( function_exists( 'cleanretina_breadcrumb' ) )
   				cleanretina_breadcrumb();
   		}
   	?>
 		<?php 
 			if( 'below-slider' == $options[ 'slogan_position' ] && ( is_home() || is_front_page() ) ) 
 				if( function_exists( 'cleanretina_home_slogan' ) )
 					cleanretina_home_slogan(); 
 		?>
	</div><!-- .wrapper -->

<?php
}

/****************************************************************************************/

if ( ! function_exists( 'cleanretina_socialnetworks' ) ) :
/**
 * This function for social links display on header
 *
 * Get links through Theme Options
 */
function cleanretina_socialnetworks( $flag ) {
	
	global $options, $array_of_default_settings;
	$options = wp_parse_args(  get_option( 'cleanretina_theme_options', array() ),  cleanretina_get_option_defaults());

	$cleanretina_socialnetworks = '';
	if ( ( 1 != $flag ) || ( 1 == $flag ) )  {
		
		$cleanretina_socialnetworks .='
			<div class="social-profiles clearfix">
				<ul>';

				$social_links = array(); 
				$social_links_name = array();
				$social_links_name = array( __( 'Facebook', 'clean-retina' ),
											__( 'Twitter', 'clean-retina' ),
											__( 'Google Plus', 'clean-retina' ),
											__( 'Pinterest', 'clean-retina' ),
											__( 'Youtube', 'clean-retina' ),
											__( 'Vimeo', 'clean-retina' ),
											__( 'LinkedIn', 'clean-retina' ),
											__( 'Flickr', 'clean-retina' ),
											__( 'Tumblr', 'clean-retina' ),
											__( 'Myspace', 'clean-retina' ),
											__( 'RSS', 'clean-retina' )
											);
				$social_links = array( 	'Facebook' 		=> 'social_facebook',
												'Twitter' 		=> 'social_twitter',
												'Google-Plus'	=> 'social_googleplus',
												'Pinterest' 	=> 'social_pinterest',
												'You-tube'		=> 'social_youtube',
												'Vimeo'			=> 'social_vimeo',
												'Linked'			=> 'social_linkedin',
												'Flickr'			=> 'social_flickr',
												'Tumblr'			=> 'social_tumblr',
												'My-Space'		=> 'social_myspace',
												'RSS'				=> 'social_rss'  
											);
				
				$i=0;
				foreach( $social_links as $key => $value ) {
					if ( !empty( $options[ $value ] ) ) {
						$cleanretina_socialnetworks .=
							'<li class="'.strtolower($key).'"><a href="'.esc_url( $options[ $value ] ).'" title="'.sprintf( esc_attr__( '%1$s on %2$s', 'clean-retina' ), get_bloginfo( 'name' ), $social_links_name[$i] ).'" target="_blank" rel="noopener noreferrer">'.get_bloginfo( 'name' ).' '.$social_links_name[$i].'</a></li>';
					}
					$i++;
				}			
		
				$cleanretina_socialnetworks .='
			</ul>
			</div><!-- .social-profiles -->';
	}
	echo $cleanretina_socialnetworks;
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'cleanretina_home_slogan' ) ) :
/**
 * Display Home Slogan.
 *
 * Function that enable/disable the home slogan1 and home slogan2.
 */
function cleanretina_home_slogan() {	
	global $options, $array_of_default_settings;
	$options = wp_parse_args(  get_option( 'cleanretina_theme_options', array() ),  cleanretina_get_option_defaults());
	
	$cleanretina_home_slogan = '';
	if(( !empty( $options[ 'home_slogan1' ] ) || !empty( $options[ 'home_slogan2' ] ) ) ) {
      
		if ( 1 != $options[ 'disable_slogan' ] ) {
			$cleanretina_home_slogan .= '<section class="slogan">';
			if ( !empty( $options[ 'home_slogan1' ] ) ) {
				$cleanretina_home_slogan .= $options[ 'home_slogan1' ];
			}
			if ( !empty( $options[ 'home_slogan2' ] ) ) {
				$cleanretina_home_slogan .= '<span>'.$options[ 'home_slogan2' ].'</span>';
			}
			$cleanretina_home_slogan .= '</section><!-- .slogan -->';
		}
	}	
	echo $cleanretina_home_slogan;
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'cleanretina_featured_post_slider' ) ) :
/**
 * display featured post slider
 */
function cleanretina_featured_post_slider() {	
	global $post;
		
	global $options, $array_of_default_settings;
	$options = wp_parse_args(  get_option( 'cleanretina_theme_options', array() ),  cleanretina_get_option_defaults());
	
	$cleanretina_featured_post_slider = '';
	if( !empty( $options[ 'featured_post_slider' ] ) ) {
		
		$cleanretina_featured_post_slider .= '
		<section class="featured-slider"><div class="slider-wrap"><div class="slider-cycle">';
			$get_featured_posts = new WP_Query( array(
				'posts_per_page' 			=> $options[ 'slider_quantity' ],
				'post_type'					=> array( 'post', 'page' ),
				'post__in'		 			=> $options[ 'featured_post_slider' ],
				'orderby' 		 			=> 'post__in',
				'ignore_sticky_posts' 	=> 1 						// ignore sticky posts
			));
			$i=0; while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
				$title_attribute = the_title_attribute( array( 'echo' => false ) );
				$excerpt = get_the_excerpt();
				if ( 1 == $i ) { $classes = "slides displayblock"; } else { $classes = "slides displaynone"; }
				$cleanretina_featured_post_slider .= '
				<div class="'.$classes.'">';
						if( has_post_thumbnail() ) {
	
							$cleanretina_featured_post_slider .= '<figure><a href="' . get_permalink() . '" title="'.the_title('','',false).'">';
	
							$cleanretina_featured_post_slider .= get_the_post_thumbnail( $post->ID, 'slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'pngfix' ) ).'</a></figure>';
						}
						if( $title_attribute != '' || $excerpt !='' ) {
						$cleanretina_featured_post_slider .= '
							<article class="featured-text">';
							if( $title_attribute !='' ) {
									$cleanretina_featured_post_slider .= the_title( '<span>','</span>', false );
								}
							if( $excerpt !='' ) {								
								$cleanretina_featured_post_slider .= $excerpt.'<a href="' . get_permalink() . '" title="'.the_title('','',false).'">'.' '.__( 'Continue Reading', 'clean-retina' ).'</a>';
							}
						$cleanretina_featured_post_slider .= '
							</article><!-- .featured-text -->';
						}
				$cleanretina_featured_post_slider .= '
				</div><!-- .slides -->';
			endwhile; wp_reset_query();
		$cleanretina_featured_post_slider .= '</div></div>				
		<nav id="controllers" class="clearfix">
		</nav><!-- #controllers --></section><!-- .featured-slider -->';
	}
	echo $cleanretina_featured_post_slider;	
}
endif;

/****************************************************************************************/

if ( ! function_exists( 'cleanretina_breadcrumb' ) ) :
/**
 * Display breadcrumb on header.
 *
 * If the page is home or front page, slider is displayed.
 * In other pages, breadcrumb will display if breadcrumb NavXT plugin exists.
 */
function cleanretina_breadcrumb() {
	if( function_exists( 'bcn_display' ) ) {
		echo '<div class="breadcrumb">';                
		bcn_display();               
		echo '</div> <!-- .breadcrumb -->'; 
	}       
}
endif;

?>
