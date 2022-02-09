<?php



add_action('init','church_options');



if (!function_exists('church_options')) {

function church_options(){

	

// VARIABLES

if( function_exists( 'wp_get_theme' ) ) {

    if( is_child_theme() ) {

        $temp_obj = wp_get_theme();

        $theme_obj = wp_get_theme( $temp_obj->get('Template') );

    } else {

        $theme_obj = wp_get_theme();

    }

    $themeversion = $theme_obj->get('Version');

    $themename = $theme_obj->get('Name');

} else { 

    $theme_data = get_theme_data(STYLESHEETPATH . '/style.css');

    $themename = $theme_data['Name'];

    $themeversion = $theme_data['Version'];

}

$shortname = "church";



// Populate option in array for use in theme

global $church_options;

$church_options = get_option('church_options');



$GLOBALS['template_path'] = church_DIRECTORY;



//Access the WordPress Categories via an Array

$church_categories = array();  

$church_categories_obj = get_categories('hide_empty=0');

foreach ($church_categories_obj as $church_cat) {

    $church_categories[$church_cat->cat_ID] = $church_cat->cat_name;}

$categories_tmp = array_unshift($church_categories, "Select a category:");    

       

//Access the WordPress Pages via an Array

$church_pages = array();

$church_pages_obj = get_pages('sort_column=post_parent,menu_order');    

foreach ($church_pages_obj as $church_page) {

    $church_pages[$church_page->ID] = $church_page->post_name; }

$church_pages_tmp = array_unshift($church_pages, "Select a page:");       



// Image Alignment radio box

$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 



// Image Links to Options

$options_image_link_to = array("image" => "The Image","post" => "The Post"); 



//Testing 

$options_select = array("one","two","three","four","five"); 

$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 



//Stylesheets Reader

$alt_stylesheet_path = church_FILEPATH . '/css/';

$alt_stylesheets = array();



if ( is_dir($alt_stylesheet_path) ) {

    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 

        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {

            if(stristr($alt_stylesheet_file, ".css") !== false) {

                $alt_stylesheets[] = $alt_stylesheet_file;

            }

        }    

    }

}



//More Options

$uploads_arr = wp_upload_dir();

$all_uploads_path = $uploads_arr['path'];

$all_uploads = get_option('church_uploads');

$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");

$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");



// Set the Options Array

$options = array();









$options[] = array( "name" => __('General Settings','framework'),

                    "type" => "heading");

                    

$options[] = array( "name" => "",

					"message" => __('Control and configure the general setup of your theme. Upload your preferred logo, setup your feeds and insert your analytics tracking code.','framework'),

					"type" => "intro");

                    

$options[] = array( "name" => __('','framework'),

					"desc" => __('','framework'),

					"id" => $shortname."_text",

					"std" => "",

					"type" => "hidden");

$options[] = array( "name" => __('Custom Logo','framework'),

					"desc" => __('Upload a logo for your theme, or specify the image address of your online logo. (http://example.com/logo.png)','framework'),

					"id" => $shortname."_logo",

					"std" => "",

					"type" => "upload");



$options[] = array( "name" => __('Map Direction Link','framework'),

					"desc" => __('Enter the URL for Map Direction.','framework'),

					"id" => $shortname."_map",

					"std" => "",

					"type" => "text");



$options[] = array( "name" => __('Custom Favicon','framework'),

					"desc" => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.','framework'),

					"id" => $shortname."_custom_favicon",

					"std" => "",

					"type" => "upload");



$options[] = array( "name" => __('Tracking Code','framework'),

					"desc" => __('Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.','framework'),

					"id" => $shortname."_google_analytics",

					"std" => "",

					"type" => "textarea"); 





$options[] = array( "name" => __('Styling Options','framework'),

					"type" => "heading");

wp_enqueue_script('jscolor.js', get_bloginfo( 'stylesheet_directory' ) . '/js/jscolor.js'); //color picker

$options[] = array( "name" => "",

					"message" => __('Configure the visual appearance of your theme by choosing your preferred colors for different sections of the website or by inserting any custom CSS necessary.','framework'),

					"type" => "intro");



$options[] = array( "name" => __('Body Background Color (default #ffffff)','framework'),

					"desc" => __('Body Background Color.','framework'),

					"id" => $shortname."_bodybg",

					"std" => "#ffffff",

					"type" => "color-picker"); 

					

$options[] = array( "name" => __('Header Background Color (default #efefef)','framework'),

					"desc" => __('Header Background Color.','framework'),

					"id" => $shortname."_headerbg",

					"std" => "#efefef",

					"type" => "color-picker");



$options[] = array( "name" => __('Footer Background Color (default #efefef)','framework'),

					"desc" => __('Footer Background Color.','framework'),

					"id" => $shortname."_footerbg",

					"std" => "#efefef",

					"type" => "color-picker");



$options[] = array( "name" => __('Images and Slider Background Color (default #ffffff)','framework'),

					"desc" => __('Images and Slider Background Color.','framework'),

					"id" => $shortname."_sliderbg",

					"std" => "#ffffff",

					"type" => "color-picker");



$options[] = array( "name" => __('Borders (including form input fields) Color (default #d2d2d2)','framework'),

					"desc" => __('Borders (including form input fields) Color.','framework'),

					"id" => $shortname."_borders",

					"std" => "#d2d2d2",

					"type" => "color-picker");



$options[] = array( "name" => __('Navigation Menu Background Color (default #256dbf)','framework'),

					"desc" => __('Navigation Menu Background Color.','framework'),

					"id" => $shortname."_navbg",

					"std" => "#256dbf",

					"type" => "color-picker");



$options[] = array( "name" => __('Navigation Menu Bottom Border and Dropdown Background Color (default #124a88)','framework'),

					"desc" => __('Navigation Menu Bottom Border and Dropdown Background Color.','framework'),

					"id" => $shortname."_navborder",

					"std" => "#124a88",

					"type" => "color-picker");



$options[] = array( "name" => __('Navigation Menu Links Color (default #ffffff)','framework'),

					"desc" => __('Navigation Menu Links Color.','framework'),

					"id" => $shortname."_navlinks",

					"std" => "#ffffff",

					"type" => "color-picker");



$options[] = array( "name" => __('Navigation Menu Links on Hover Color (default #f0f235)','framework'),

					"desc" => __('Navigation Menu Links on Hover Color.','framework'),

					"id" => $shortname."_navlinkshover",

					"std" => "#f0f235",

					"type" => "color-picker");



$options[] = array( "name" => __('Site Title Text Color (default #000000)','framework'),

					"desc" => __('Site Title Text Color.','framework'),

					"id" => $shortname."_sitetitle",

					"std" => "#000000",

					"type" => "color-picker");



$options[] = array( "name" => __('Maps and Directions Button Background Color (default #f59c29)','framework'),

					"desc" => __('Maps and Directions Button Background Color.','framework'),

					"id" => $shortname."_directionbuttonbg",

					"std" => "#f59c29",

					"type" => "color-picker");



$options[] = array( "name" => __('Maps and Directions Button on Hover Background Color (default #124a88)','framework'),

					"desc" => __('Maps and Directions Button on Hover Background Color.','framework'),

					"id" => $shortname."_directionbuttonbghover",

					"std" => "#124a88",

					"type" => "color-picker");



$options[] = array( "name" => __('Default Link Color (default #256dbf)','framework'),

					"desc" => __('Default link color used at most of the links on whole website.','framework'),

					"id" => $shortname."_defaultlink",

					"std" => "#256dbf",

					"type" => "color-picker");



$options[] = array( "name" => __('Default Link on Hover Color (default #f59c29)','framework'),

					"desc" => __('Maps and Directions Button on Hover Background Color.','framework'),

					"id" => $shortname."_defaultlinkhover",

					"std" => "#f59c29",

					"type" => "color-picker");



$options[] = array( "name" => __('Slider Control Buttons Background Color (default #bbbbbb)','framework'),

					"desc" => __('Slider Control Buttons Background Color.','framework'),

					"id" => $shortname."_slidercontrol",

					"std" => "#bbbbbb",

					"type" => "color-picker");



$options[] = array( "name" => __('Active Slider Control Button Background Color (default #f59c29)','framework'),

					"desc" => __('Active Slider Control Button Background Color.','framework'),

					"id" => $shortname."_activeslidercontrol",

					"std" => "#f59c29",

					"type" => "color-picker");



$options[] = array( "name" => __('Main Body Text Color (default #333333)','framework'),

					"desc" => __('Main Body Text Color.','framework'),

					"id" => $shortname."_bodytext",

					"std" => "#333333",

					"type" => "color-picker");



$options[] = array( "name" => __('Headers and Sub-Headers Color (default #000000)','framework'),

					"desc" => __('Used for H1, H2, H3, H4, H5, H6.','framework'),

					"id" => $shortname."_headers",

					"std" => "#000000",

					"type" => "color-picker");



$options[] = array( "name" => __('Search and Submit Buttons Background Color (default #256dbf)','framework'),

					"desc" => __('Search and Submit Buttons Background Color.','framework'),

					"id" => $shortname."_defaultbuttons",

					"std" => "#256dbf",

					"type" => "color-picker");



$options[] = array( "name" => __('Search and Submit Buttons on Hover Background Color (default #f59c29)','framework'),

					"desc" => __('Search and Submit Buttons on Hover Background Color.','framework'),

					"id" => $shortname."_defaultbuttonshover",

					"std" => "#f59c29",

					"type" => "color-picker");



$options[] = array( "name" => __('Button Text Color (default #ffffff)','framework'),

					"desc" => __('Button Text Color.','framework'),

					"id" => $shortname."_defaultbuttontext",

					"std" => "#ffffff",

					"type" => "color-picker");	

					

$options[] = array( "name" => __('Custom CSS','framework'),

                    "desc" => __('Quickly add some CSS to your theme by adding it to this block.','framework'),

                    "id" => $shortname."_custom_css",

                    "std" => "",

                    "type" => "textarea");







$options[] = array( "name" => __('Slider Options','framework'),

					"type" => "heading");

					

$options[] = array( "name" => "",

					"message" => __('Setup and configure your homepage slider. Upload your slider images and link them to URLs of your choice.','framework'),

					"type" => "intro");



$options[] = array( "name" => "Choose a Slideshow Effect",

	"desc" => "Choose a effect for changing slides.",

	"id" => $shortname."_slideshow_effect",

	"options" => array('random', 'sliceDown', 'sliceDownLeft', 'sliceUp', 'sliceUpLeft', 'sliceUpDown', 'sliceUpDownLeft', 'fold', 'fade', 'slideInRight', 'slideInLeft', 'boxRandom', 'boxRain', 'boxRainReverse', 'boxRainGrow', 'boxRainGrowReverse' ),

	"std" => "random",

	"type" => "select");



$options[] = array(  

	"name" => "Slideshow Pause time",

	"desc" => "Fill the Pause time of the slide before changing in milliseconds. Default is 7000.",

	"id" => $shortname."_slideshow_pausetime",

	"std" => "",

	"type" => "text");

     				

update_option('church_template',$options); 					  

update_option('church_themename',$themename);   

update_option('church_shortname',$shortname);



}

}

?>