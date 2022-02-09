<?php

include 'theme_options.php';
include 'guide.php';
include_once 'lib/meta-box-3.2.2.class.php';
include 'lib/meta-box-usage.php';
include 'lib/post-types.php';




/* SIDEBARS *////////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	
    ));
	register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<li class="botwid">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));		
	
	
/* CUSTOM MENUS *////////////////////////////////////////////////////////////////////	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	


/* CUSTOM EXCERPTS *////////////////////////////////////////////////////////////////////
	
	
function wpe_excerptlength_archive($length) {
    return 60;
}
function wpe_excerptlength_index($length) {
    return 30;
}


function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


/* FEATURED THUMBNAILS *////////////////////////////////////////////////////////////////////

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );


}

/* GET THUMBNAIL URL *////////////////////////////////////////////////////////////////////

function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}	

/* PAGE NAVIGATION *////////////////////////////////////////////////////////////////////


function getpagenavi(){
?>
<div id="navigation">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','web2feeel')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','web2feel')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php
}

	
/* Comments *///////////////////////////////////////////////////////////////////
	
function my_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">

			<div class="authordata ">
				<div class="avatar">
					<?php echo get_avatar($comment,$size='40'); ?>
				</div> <!-- end .avatar-->	
				<div class="avatmeta">
				<?php printf( '<span class="fn"> %s </span>', get_comment_author_link() ); ?>
				<span class="comment-meta commentmetadata"><?php printf(__(' On %1$s '), get_comment_date()) ?></span>
				</div>
				<span class="reply-container"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('reply',''),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>

			
			</div>
			
			<div class="comment-wrap">
				<div class="comment-wrap-inner clearfix">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php _e('Your comment is awaiting moderation.','') ?></em>
						<br />
					<?php endif; ?>
						<div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->
				</div> <!-- end comment-wrap-inner -->  
			</div> <!-- end comment-wrap-->
		
		</div> <!-- end comment-body-->	
<?php } ?>
<?php function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?> 
<?php } ?>
<?php //modify the comment counts to only reflect the number of comments minus pings
if( phpversion() >= '4.4' ) add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$get_comments = get_comments('post_id=' . $id);
			$comments_by_type = &separate_comments($get_comments);
			return count($comments_by_type['comment']);	
		} else {
            return $count;
        }
}

/* Admin css *///////////////////////////////////////////////////////////////////

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/lib/guide.css", false, "1.0", "all");
}
add_action('admin_init', 'mytheme_add_init');

?>