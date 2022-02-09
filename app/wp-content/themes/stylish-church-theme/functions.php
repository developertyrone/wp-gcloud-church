<?php
//Start churchThemes Functions - Please refrain from editing this file.

$functions_path = TEMPLATEPATH . '/functions/';
$includes_path = TEMPLATEPATH . '/includes/';

// Options panel variables and functions
require_once ($functions_path . 'admin-setup.php');

// Custom functions and plugins
require_once ($functions_path . 'admin-functions.php');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Home Link to Custom Menu (Main Navigation)
// function add_home_menu_link($menu_items, $args) {
// 	if('main_navigation' == $args->theme_location) {
// 		$class = '';
// 		$home_menu_item = '<li ' . $class . '>' .
// 			$args->before .
// 			'<a href="' . home_url( '/' ) . '" title="Home">' . $args->link_before . 'Home' . $args->link_after . // '</a>' . $args->after . '</li>';
// 		$menu_items = $home_menu_item . $menu_items;
// 	}
// 	return $menu_items;
// }
// add_filter( 'wp_nav_menu_items', 'add_home_menu_link', 10, 2 );
// END // Home Link to Custom Menu (Main Navigation)

// Thumbnails

add_theme_support('post-thumbnails');
set_post_thumbnail_size(958, 9999);
add_image_size('slide-background', 940, 350, true);

add_image_size('media-small', 85, 55, true);
add_image_size('media-medium', 180, 130, true);
add_image_size('media-large', 980, 9999);

add_image_size('event-small', 85, 55, true);
add_image_size('event-medium', 150, 100, true);
add_image_size('event-large', 450, 300, true);

// Custom fields 
// require_once ($functions_path . 'admin-custom.php');

// More churchThemes Page
require_once ($functions_path . 'admin-theme-page.php');

// Admin Interface!
require_once ($functions_path . 'admin-interface.php');

// Options panel settings
require_once ($includes_path . 'theme-options.php'); // What we do!

//Custom Theme Fucntions
require_once ($includes_path . 'theme-functions.php'); 

//Custom Comments
require_once ($includes_path . 'theme-comments.php'); 

// Load Javascript in wp_head
require_once ($includes_path . 'theme-js.php');

// Widgets  & Sidebars
require_once ($includes_path . 'sidebar-init.php');
require_once ($includes_path . 'theme-widgets.php');

add_action('wp_head', 'churchthemes_wp_head');
add_action('admin_menu', 'churchthemes_add_admin');
add_action('admin_head', 'churchthemes_admin_head');    

function new_excerpt_length($length) {
	return 100;
}

add_filter('excerpt_length', 'new_excerpt_length');
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit+ 1));
 if(count($words) > $word_limit) {
  array_pop($words);
  //add a ... at last article when more than limitword count

  echo implode(' ', $words)."..."; } else {
 //otherwise
 echo implode(' ', $words); }

}


// Registering Menus For Theme

add_action( 'init', 'register_my_menus' );
function register_my_menus() {

	register_nav_menus(

		array(

			'main-nav-menu' => __( 'Main Navigation Menu' ),
			'footer-menu' => __( 'Footer Menu' )

	)

	);

}



add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {

	register_post_type( 'slide',

		array(

		'labels' => array(

		'name' => __( 'Slides' ),

		'singular_name' => __( 'Slide' ),

		'add_new' => __( 'Add New' ),

		'add_new' => 'Add New Slide',

		'add_new_item' => __( 'Add New Slide' ),

		'edit' => __( 'Edit' ),

		'edit_item' => __( 'Edit Slide' ),

		'new_item' => __( 'New Slide' ),

		'view' => __( 'View Slide' ),

		'view_item' => __( 'View Slides' ),

		'search_items' => __( 'Search Slides' ),

		'not_found' => __( 'No Slides found' ),

		'not_found_in_trash' => __( 'No Slides found in Trash' ),

		'parent' => __( 'Parent Slide' )

		),

'public' => true,

'supports' => array('thumbnail','title'),

'rewrite' => true,

'query_var' => true,

'exclude_from_search' => true,

'show_ui' => true,

'capability_type' => 'post'

		)
	);


// Add Metaboxes for slider

function add_slide_metaboxes(){

	add_meta_box("slide_link", "Slide Link", "slide_metabox", "slide", "normal", "high");

}

add_action("admin_init", "add_slide_metaboxes");

// END // Add Metaboxes

// - - - - - - - - - - - - - - - - - - - - - - -

// Slide Link

function slide_metabox(){

	global $post;

	$custom = get_post_custom($post->ID);

	$slide_link = $custom["slide_link"][0];

	?>

    <label>Slide link:</label>

	<input name="slide_link" value="<?php echo $slide_link; ?>" style="width: 50%;" />

	<?php
}


// END // Slide Link
// - - - - - - - - - - - - - - - - - - - - - - -
// Save



function save_link($post_id) {

	global $post;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {

	return $post->ID;

	} 

	update_post_meta($post->ID, "slide_link", $_POST["slide_link"]);



}



add_action('save_post', 'save_link');

// END // Save





	register_post_type( 'sermon_post',

		array(

			'labels' => array(

			'name' => __( 'Media Items' ),

			'singular_name' => __( 'Media Item' ),

			'add_new' => __( 'Add New' ),

			'add_new' => 'Add New Media Item',

			'add_new_item' => __( 'Add New Media Item' ),

	'edit' => __( 'Edit' ),

	'edit_item' => __( 'Edit Media Item' ),

	'new_item' => __( 'New Media Item' ),

	'view' => __( 'View Media Item' ),

	'view_item' => __( 'View Media Item' ),

	'search_items' => __( 'Search Media Items' ),

	'not_found' => __( 'No Media Items found' ),

	'not_found_in_trash' => __( 'No Media Items found in Trash' ),

	'parent' => __( 'Parent Media Item' )

	),

'public' => true,

'supports' => array('title','editor','comments','thumbnail'),

'query_var' => true,

'exclude_from_search' => false,

		)

	);

}


// Create Meta boxes for media post type

function add_sermon_metaboxes(){

	add_meta_box("sermon_speaker", "Sermon Speaker", "sermon_metabox", "sermon_post", "side", "low");

	add_meta_box("sermon_filelink", "Sermon Link", "sermon_metabox1", "sermon_post", "side", "low");

}

add_action("admin_init", "add_sermon_metaboxes");


// END // Add Metaboxes

// - - - - - - - - - - - - - - - - - - - - - - -

// Sermon Speaker

function sermon_metabox(){

	global $post;

	$custom = get_post_custom($post->ID);

	$sermon_speaker = $custom["sermon_speaker"][0];

	?>

    <label>Name of the speaker:</label>

    <input name="sermon_speaker" value="<?php echo $sermon_speaker; ?>" style="width: 90%;" />

<?php

}

// END // Sermon Speaker

// - - - - - - - - - - - - - - - - - - - - - - -

// Save

function save_speaker($post_id) {

	global $post;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {

	return $post->ID;

	} 

	update_post_meta($post->ID, "sermon_speaker", $_POST["sermon_speaker"]);

}

add_action('save_post', 'save_speaker');

// - - - - - - - - - - - - - - - - - - - - - - -

// - - - - - - - - - - - - - - - - - - - - - - -

// Sermon Link

function sermon_metabox1(){

	global $post;

	$custom = get_post_custom($post->ID);

	$sermon_filelink = $custom["sermon_filelink"][0];

	?>



    <label>Link to the Mp3 File:</label>

    <input name="sermon_filelink" value="<?php echo $sermon_filelink; ?>" style="width: 100%;" />

<?php

}

// END // Sermon Link

// - - - - - - - - - - - - - - - - - - - - - - -

// Save

function save_filelink($post_id) {

	global $post;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {

	return $post->ID;

	} 

	update_post_meta($post->ID, "sermon_filelink", $_POST["sermon_filelink"]);

}

add_action('save_post', 'save_filelink');

// - - - - - - - - - - - - - - - - - - - - - - -

/**

 * Enables the Event custom post type

 */

require_once(STYLESHEETPATH . '/extensions/event-post-type.php');

/**

 * Enables the Event Widget

 */

// require_once(STYLESHEETPATH . '/extensions/event-widget.php');

?>