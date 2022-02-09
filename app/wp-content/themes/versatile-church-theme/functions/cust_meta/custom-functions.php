<?php

/**

 * Include and setup custom metaboxes and fields.

 *

 * @category YourThemeOrPlugin

 * @package  Metaboxes

 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)

 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress

 */

$timezone=get_option('church_timezone');

date_default_timezone_set($timezone);

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes_events' );

/**

 * Define the metabox and field configurations.

 *

 * @param  array $meta_boxes

 * @return array

 */

function cmb_sample_metaboxes_events( array $meta_boxes ) {



	// Start with an underscore to hide fields from custom fields list

	$prefix = 'events_';



	$meta_boxes[] = array(

		'id'         => 'Event_metabox',

		'title'      => 'Event Metabox',

		'pages'      => array( 'events', ), // Post type

		'context'    => 'normal',

		'priority'   => 'high',

		'show_names' => true, // Show field names on the left

		'fields'     => array(

			array(

				'name' => 'Event Date & Time',

				'desc' => 'Select Date & time for event.',

				'id'   => $prefix . 'datetime',

				'type' => 'text_datetime_timestamp',

			),

			array(

				'name' => 'Event Location',

				'desc' => 'Enter location for event',

				'id'   => $prefix . 'location',

				'type' => 'text',

			),

			array(

				'name' => 'Address',

				'desc' => 'Enter address for event',

				'id'   => $prefix . 'address',

				'type' => 'text',

			),

			)	);



	// Add other metaboxes as needed



	return $meta_boxes;

}



add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes_media' );

/**

 * Define the metabox and field configurations.

 *

 * @param  array $meta_boxes

 * @return array

 */

function cmb_sample_metaboxes_media( array $meta_boxes ) {



	// Start with an underscore to hide fields from custom fields list

	$prefix = 'media_';



	$meta_boxes[] = array(

		'id'         => 'Sermon_metabox',

		'title'      => 'Sermon Metabox',

		'pages'      => array( 'sermon', ), // Post type

		'context'    => 'normal',

		'priority'   => 'high',

		'show_names' => true, // Show field names on the left

		'fields'     => array(

			array(

				'name' => 'Sermon Speaker',

				'desc' => 'Enter name of speaker',

				'id'   => $prefix . 'speaker',

				'type' => 'text_medium',

			),

			array(

				'name' => 'Video URL',

				'desc' => 'Enter the url of the video',

				'id'   => $prefix . 'vurl',

				'type' => 'text',

			),

			array(

				'name' => 'Audio URl',

				'desc' => 'Enter the url of the audio',

				'id'   => $prefix . 'aurl',

				'type' => 'text',

			),

			)	);



	// Add other metaboxes as needed



	return $meta_boxes;

}

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes_slide' );

/**

 * Define the metabox and field configurations.

 *

 * @param  array $meta_boxes

 * @return array

 */

function cmb_sample_metaboxes_slide( array $meta_boxes ) {



	// Start with an underscore to hide fields from custom fields list

	$prefix = 'slide_';



	$meta_boxes[] = array(

		'id'         => 'Slide_metabox',

		'title'      => 'Slide Metabox',

		'pages'      => array( 'slide', ), // Post type

		'context'    => 'normal',

		'priority'   => 'high',

		'show_names' => true, // Show field names on the left

		'fields'     => array(

			
			array(

				'name' => 'Slide Link',

				'desc' => 'Enter the link for the slide image',

				'id'   => $prefix . 'slink',

				'type' => 'text',

			),

			

			)	);



	// Add other metaboxes as needed



	return $meta_boxes;

}



add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**

 * Initialize the metabox class.

 */

function cmb_initialize_cmb_meta_boxes() {



	if ( ! class_exists( 'cmb_Meta_Box' ) )

		require_once 'init.php';



}