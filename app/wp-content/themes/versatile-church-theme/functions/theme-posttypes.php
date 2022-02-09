<?php



/*-----------------------------------------------------------------------------------



	Add Post Type



-----------------------------------------------------------------------------------*/





function event_posttype() {

	register_post_type( 'events',

		array(

			'labels' => array(

				'name' => __( 'Events','framework' ),

				'singular_name' => __( 'event','framework' ),				

				'add_new' => __( 'Add New Event','framework' ),

				'add_new_item' => __( 'Add New Event','framework' ),

				'edit_item' => __( 'Edit Event','framework' ),

				'new_item' => __( 'Add New Event','framework' ),

				'view_item' => __( 'View Event','framework' ),

				'search_items' => __( 'Search Event','framework' ),

				'not_found' => __( 'No events found','framework' ),

				'not_found_in_trash' => __( 'No events found in trash','framework' )

			),

			'public' => true,

			'supports' => array( 'title', 'editor', 'comments' ),

			'capability_type' => 'post',

			'query_var' => true,

			'rewrite' => array( 'slug' => 'event', 'with_front' => false ),

			'exclude_from_search' => false,

			'menu_position' => '5'

		)

	);

}



add_action( 'init', 'event_posttype' );



function media_posttype() {

	register_post_type( 'Sermon',

		array(

			'labels' => array(

				'name' => __( 'Media Items','framework' ),

				'singular_name' => __( 'Media Item','framework' ),				

				'add_new' => __( 'Add New Media Item','framework' ),

				'add_new_item' => __( 'Add New Media Item','framework' ),

				'edit_item' => __( 'Edit Media Item','framework' ),

				'new_item' => __( 'Add New Media Item','framework' ),

				'view_item' => __( 'View Media Item','framework' ),

				'search_items' => __( 'Search Media Items','framework' ),

				'not_found' => __( 'No Media Items found','framework' ),

				'not_found_in_trash' => __( 'No Media Items found in trash','framework' )

			),

			'public' => true,

			'supports' => array( 'title', 'editor', 'comments' ),

			'capability_type' => 'post',

			'query_var' => true,

			'rewrite' => array( 'slug' => 'sermon', 'with_front' => false ),
			
			'exclude_from_search' => false,

			'menu_position' => '5'

		)

	);

	

	register_taxonomy( 'media_tags', 'sermon', 

		array( 

			'hierarchical' => false,

			'label' => __( 'Media Tags','framework' ), 

			'labels' => array(

				'name' => __( 'Media Tags','framework' ),

				'singular_name' => __( 'Media Tag','framework' )

			),
		
			'rewrite' => array(

			'slug' => 'media-tags', 

			'with_front' => true, 

			'hierarchical' => false

		),


		));

}



add_action( 'init', 'media_posttype' );



function slide_posttype() {

	register_post_type( 'slide',

		array(

			'labels' => array(

				'name' => __( 'Slides','framework' ),

				'singular_name' => __( 'slide','framework' ),				

				'add_new' => __( 'Add New Slide','framework' ),

				'add_new_item' => __( 'Add New Slide','framework' ),

				'edit_item' => __( 'Edit slide','framework' ),

				'new_item' => __( 'Add New slide','framework' ),

				'view_item' => __( 'View Slide','framework' ),

				'search_items' => __( 'Search Slides','framework' ),

				'not_found' => __( 'No slides found','framework' ),

				'not_found_in_trash' => __( 'No slides found in trash','framework' )

			),

			'public' => true,

			'supports' => array( 'title', 'thumbnail' ),

			'capability_type' => 'post',

			'rewrite' => array( 'slug' => 'slide', 'with_front' => true ),

			'exclude_from_search' => false,

			'menu_position' => '5'

		)

	);

	

}



add_action( 'init', 'slide_posttype' );

?>