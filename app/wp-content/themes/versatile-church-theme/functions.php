<?php
/*-----------------------------------------------------------------------------------
	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file,
	When things go wrong, they tend to go wrong in a big way.
	You have been warned!
-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Register WP3.0+ Menus
/*-----------------------------------------------------------------------------------*/



function register_menu() {

	register_nav_menu('header-menu', __('Header','framework'));

	register_nav_menu('footer-menu', __('Footer','framework'));

}

add_action('init', 'register_menu');

/*-----------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain('framework');

/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width (use in conjuction with ".entry-content img" css)
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 680;

/*-----------------------------------------------------------------------------------*/
/*	Register Sidebars
/*-----------------------------------------------------------------------------------*/



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Main Sidebar',

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget' => '</section>',

		'before_title' => '<h4>',

		'after_title' => '</h4>',

	));

	register_sidebar(array(

		'name' => 'HomePage',

		'before_widget' => '<section id="%1$s" class="widget columns %2$s">',

		'after_widget' => '</section>',

		'before_title' => '<h4>',

		'after_title' => '</h4>',

	));

	register_sidebar(array(

		'name' => 'Sermons Page Sidebar',

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget' => '</section>',

		'before_title' => '<h4>',

		'after_title' => '</h4>',

	));

	register_sidebar(array(

		'name' => 'Events Page Sidebar',

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget' => '</section>',

		'before_title' => '<h4>',

		'after_title' => '</h4>',

	));

}

/*-----------------------------------------------------------------------------------*/
/*	Configure WP2.9+ Thumbnails
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size(960, 9999);

	add_image_size( 'slide-background', 920, 405, true ); // Alt Large thumbnails

}

/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/

function church_custom_gravatar( $avatar_defaults ) {

    $church_avatar = get_template_directory_uri() . '/images/gravatar.png';

    $avatar_defaults[$church_avatar] = 'Custom Gravatar (/images/gravatar.png)';

    return $avatar_defaults;

}

add_filter( 'avatar_defaults', 'church_custom_gravatar' );

/*-----------------------------------------------------------------------------------*/
/*	Change Default Excerpt Length
/*-----------------------------------------------------------------------------------*/

function church_excerpt_length($length) {

return 30; }

add_filter('excerpt_length', 'church_excerpt_length');

/*-----------------------------------------------------------------------------------*/
/*	Configure Excerpt String
/*-----------------------------------------------------------------------------------*/

function church_excerpt_more($excerpt) {

return str_replace('[...]', '...', $excerpt); }

add_filter('wp_trim_excerpt', 'church_excerpt_more');

/*-----------------------------------------------------------------------------------*/

/*	Helpful function to see if a number is a multiple of another number

/*-----------------------------------------------------------------------------------*/

function is_multiple($number, $multiple) 
{ 
    return ($number % $multiple) == 0; 
} 

/*-----------------------------------------------------------------------------------*/
/*	Register and load common JS
/*-----------------------------------------------------------------------------------*/

function church_enqueue_scripts() {

    // Register our scripts

	wp_register_style( 'main-stylesheet', get_template_directory_uri() . '/style.css' );

	wp_register_style( 'custom-colors', get_template_directory_uri() . '/css/colors.php' );

	wp_register_style( 'nivo-slider', get_template_directory_uri() . '/css/slider/nivo-slider.css' );

	wp_register_style( 'slider-default', get_template_directory_uri() . '/css/slider/default/default.css' );

	wp_register_style( 'skeleton-grid', get_template_directory_uri() . '/css/skeleton.css' );

	wp_register_style( 'church_shortcodes', get_template_directory_uri() . '/css/shortcodes.css' );

	wp_register_style( 'mediaelements', get_template_directory_uri() . '/mediaelement/mediaelementplayer.css' );

	wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js', 'jquery');

	wp_register_script('church_custom', get_template_directory_uri() . '/js/jquery.custom.js', 'jquery');

	wp_register_script('church_shortcodes', get_template_directory_uri() . '/js/jquery.shortcodes.js', 'jquery');

	wp_register_script('nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', 'jquery');

	wp_register_script('media-elements', get_template_directory_uri() . '/mediaelement/mediaelement-and-player.min.js', 'jquery');



	// Enqueue our scripts

	wp_enqueue_script('jquery');

	wp_enqueue_script('jquery-effects-core');

	wp_enqueue_script('jquery-ui-tabs');

	wp_enqueue_script('jquery-ui-accordion');

	wp_enqueue_script('superfish');

	wp_enqueue_script('nivo-slider');

	wp_enqueue_script('media-elements');

	wp_enqueue_script('church_shortcodes');

	wp_enqueue_script('church_custom'); 

	wp_enqueue_style( 'church_shortcodes' );

	wp_enqueue_style( 'main-stylesheet' );

	wp_enqueue_style( 'mediaelements' );

	wp_enqueue_style( 'slider-default' );

	wp_enqueue_style( 'nivo-slider' );

	wp_enqueue_style( 'skeleton-grid' );

	wp_enqueue_style( 'custom-colors' );

	

	

	global $is_IE;

	if ( $is_IE ) { wp_enqueue_script('selectivizr'); }

	if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } // loads the javascript required for threaded comments 

    if ( is_page_template( 'template-contact.php' ) ) { wp_enqueue_script('validation'); }

}

add_action('wp_enqueue_scripts', 'church_enqueue_scripts');





/*-----------------------------------------------------------------------------------*/

/*	Add Browser Detection Body Class

/*-----------------------------------------------------------------------------------*/



add_filter('body_class','church_browser_body_class');

function church_browser_body_class($classes) {

	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;



	if($is_lynx) $classes[] = 'lynx';

	elseif($is_gecko) $classes[] = 'gecko';

	elseif($is_opera) $classes[] = 'opera';

	elseif($is_NS4) $classes[] = 'ns4';

	elseif($is_safari) $classes[] = 'safari';

	elseif($is_chrome) $classes[] = 'chrome';

	elseif($is_IE) $classes[] = 'ie';

	else $classes[] = 'unknown';



	if($is_iphone) $classes[] = 'iphone';

	return $classes;

}





/*-----------------------------------------------------------------------------------*/

/*	Comment Styling

/*-----------------------------------------------------------------------------------*/



function church_comment($comment, $args, $depth) {



    $isByAuthor = false;



    if($comment->comment_author_email == get_the_author_meta('email')) {

        $isByAuthor = true;

    }



    $GLOBALS['comment'] = $comment; ?>

   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

     

     <section id="comment-<?php comment_ID(); ?>">

      <section class="comment-info"><?php echo get_avatar($comment,$size='64'); ?></section>

      <section class="commento">

      <section class="commento_head">

         <section class="name"><?php printf(__('%s'), get_comment_author_link()) ?></section>

	 <section class="comment-date"><?php if(get_comment_type() == "comment"){ ?>

		<?php echo get_comment_date("F j, Y") ?>

	<?php }?>

      </section>

      </section>  

      <section class="comment-text"  id="commenttext-<?php comment_ID(); ?>">

	<?php comment_text() ?>

	<?php if ($comment->comment_approved == '0') echo "<p class='unapproved'>".__('Your comment is awaiting moderation.',framework)."</p>\n"; ?>

	<section class="reply">

		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

	</section>

</section>

      

     </section>

</section>

<?php

}





/*-----------------------------------------------------------------------------------*/

/*	Seperated Pings Styling

/*-----------------------------------------------------------------------------------*/



function church_list_pings($comment, $args, $depth) {

       $GLOBALS['comment'] = $comment; ?>

<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>

<?php }





/*-----------------------------------------------------------------------------------*/

/*	Custom Login Logo Support

/*-----------------------------------------------------------------------------------*/



function church_custom_login_logo() {

    echo '<style type="text/css">

        h1 a { background-image:url('.get_template_directory_uri().'/images/custom-login-logo.png) !important; background-size: auto auto !important; }

    </style>';

}

function church_wp_login_url() {

    return home_url();

}

function church_wp_login_title() {

    return get_option('blogname');

}



add_action('login_head', 'church_custom_login_logo');

add_filter('login_headerurl', 'church_wp_login_url');

add_filter('login_headertitle', 'church_wp_login_title');





/*-----------------------------------------------------------------------------------*/

/*	Added v1.1 Set the new options to true

/*-----------------------------------------------------------------------------------*/



if(!get_option('church_lightbox'))

	update_option('church_lightbox', 'true');

	

if(!get_option('church_enable_welcome_message'))

	update_option('church_enable_welcome_message', 'true');





/*-----------------------------------------------------------------------------------*/

/*	Load Widgets & Shortcodes

/*-----------------------------------------------------------------------------------*/



// Add the Theme Post types

include("functions/theme-posttypes.php");



// Add the Theme Shortcodes

include("functions/theme-shortcodes.php");



// Add the Theme Custom Functions

include("functions/cust_meta/custom-functions.php");



// Add the Theme Custom Widgets

include("functions/widget-custom.php");



/*-----------------------------------------------------------------------------------*/

/*	Filters that allow shortcodes in Text Widgets

/*-----------------------------------------------------------------------------------*/



add_filter('widget_text', 'shortcode_unautop');

add_filter('widget_text', 'do_shortcode');



/*-----------------------------------------------------------------------------------*/

/*	Load Theme Options

/*-----------------------------------------------------------------------------------*/



define('church_FILEPATH', get_template_directory());

define('church_DIRECTORY', get_template_directory_uri());



require_once (church_FILEPATH . '/admin/admin-functions.php');

require_once (church_FILEPATH . '/admin/admin-interface.php');

require_once (church_FILEPATH . '/functions/theme-options.php');

require_once (church_FILEPATH . '/functions/theme-functions.php');

require_once (church_FILEPATH . '/tinymce/tinymce.loader.php');





function start_date_column_register( $columns ) {



       $columns['start_date'] = __( 'Event Date', 'my-plugin' );



 



	return $columns;;



}



add_filter("manage_edit-events_columns", "start_date_column_register");



 



// Display the column content



function start_date_column_display( $column_name, $post_id ) {



        if ( 'start_date' != $column_name )



                return;



 



        $start_date = get_post_meta($post_id, 'events_datetime', true);



        if ( !$start_date )



                $start_date = '<em>undefined</em>';



 



        print(date("F d, Y", $start_date));



}



add_action( 'manage_posts_custom_column', 'start_date_column_display', 10, 2 );



 



// Register the column as sortable



function start_date_column_register_sortable( $columns ) {



        $columns['start_date'] = 'start_date';



 



        return $columns;



}



add_filter( 'manage_edit-events_sortable_columns', 'start_date_column_register_sortable' );



 



function start_date_column_orderby( $vars ) {



        if ( isset( $vars['orderby'] ) && 'start_date' == $vars['orderby'] ) {



                $vars = array_merge( $vars, array(



                        'meta_key' => 'events_datetime',



                        'orderby' => 'meta_value'



                ) );



        }



 



        return $vars;



}



add_filter( 'request', 'start_date_column_orderby' );



/**



 * Removes default thumbnail width/height attr



*/



add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );  



add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 ); 



function remove_thumbnail_dimensions( $html ) {     



$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );   



return $html; } 



?>