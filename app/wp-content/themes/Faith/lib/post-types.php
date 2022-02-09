<?php 

/* Sermons*/

function post_type_sermons() {
register_post_type(
                    'sermons', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'has_archive' => true, 
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/book.png',
                    		'labels'=>array(
    									'name' => _x('Sermons', 'post type general name'),
    									'singular_name' => _x('Sermon', 'post type singular name'),
    									'add_new' => _x('Add New', 'Sermon'),
    									'add_new_item' => __('Add New Sermon'),
    									'edit_item' => __('Edit Sermon'),
    									'new_item' => __('New Sermon'),
    									'view_item' => __('View Sermon'),
    									'search_items' => __('Search Sermons'),
    									'not_found' =>  __('No Sermons found'),
    									'not_found_in_trash' => __('No Sermon found in Trash'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'query_var' => true,
							'rewrite' => true,
							'rewrite' => array( 'slug' => 'sermon', 'with_front' => FALSE,),
							'supports' => array(
							 			'title',
										'thumbnail',
										'custom-fields',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_sermons');


/* Speaker taxonomy */

function create_sermon_speaker_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Speaker', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Speaker', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Speakers' ),
   							  'all_items' => __( 'All Speakers' ),
    						  'parent_item' => __( 'Parent Speaker' ),
   					   		  'parent_item_colon' => __( 'Parent Speaker:' ),
   							  'edit_item' => __( 'Edit Speaker' ), 
  							  'update_item' => __( 'Update Speaker' ),
  							  'add_new_item' => __( 'Add New Speaker' ),
  							  'new_item_name' => __( 'New Speaker Name' ),
); 	
register_taxonomy('speaker',array('sermons'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'speaker' ),
  ));
}
add_action( 'init', 'create_sermon_speaker_taxonomy', 0 );


/* Topic taxonomy */

function create_sermon_topic_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Topic', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Search Topics' ),
   							  'all_items' => __( 'All Topics' ),
    						  'parent_item' => __( 'Parent Topic' ),
   					   		  'parent_item_colon' => __( 'Parent Topic:' ),
   							  'edit_item' => __( 'Edit Topic' ), 
  							  'update_item' => __( 'Update Topic' ),
  							  'add_new_item' => __( 'Add New Topic' ),
  							  'new_item_name' => __( 'New Topic Name' ),
); 	
register_taxonomy('topic',array('sermons'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  ));
}

add_action( 'init', 'create_sermon_topic_taxonomy', 0 );




/* Events */

function post_type_events() {
register_post_type(
                    'events', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'has_archive' => true, 
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/event.png',
                    		'labels'=>array(
    									'name' => _x('Events', 'post type general name'),
    									'singular_name' => _x('Event', 'post type singular name'),
    									'add_new' => _x('Add New', 'Event'),
    									'add_new_item' => __('Add New Event'),
    									'edit_item' => __('Edit Event'),
    									'new_item' => __('New Event'),
    									'view_item' => __('View Events'),
    									'search_items' => __('Search Events'),
    									'not_found' =>  __('No Events found'),
    									'not_found_in_trash' => __('No Event found in Trash'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'query_var' => true,
							'rewrite' => true,
							'rewrite' => array( 'slug' => 'event', 'with_front' => FALSE,),
							'supports' => array(
							 			'title',
										'thumbnail',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_events');


?>