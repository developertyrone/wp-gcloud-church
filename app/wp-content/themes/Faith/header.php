<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php 
wp_enqueue_script('jquery');
//wp_enqueue_script('bxslider', get_stylesheet_directory_uri() .'/js/jquery.bxSlider.min.js');
wp_enqueue_script('effects', get_stylesheet_directory_uri() .'/js/effects.js');
wp_enqueue_script('superfish', get_stylesheet_directory_uri() .'/js/superfish.js');
wp_enqueue_script('jwplayer', get_stylesheet_directory_uri() .'/js/jwplayer.js');
?>

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

</head>
<body>

<div id="wrapper">  <!-- wrapper begin -->

<div id="masthead"><!-- masthead begin -->

<div id="menucover">
	<div id="topmenu">
		<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary','menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
	</div>
</div>

<div id="head">
	<div id="top" class="clearfix"> 
		<div id="blogname">	
			<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
			<h3><?php bloginfo( 'description' ); ?></h3>
		</div>
<?php if(get_option('faith_show_address') == "true") { ?>
		<div class="eventbar">
			<h4>Find us here</h4>
			<address><?php $address = get_option('faith_address'); echo stripslashes($address); ?></address>
		</div>	
<?php } ?>		
	</div>
<?php if(get_option('faith_show_infobar') == "true") { ?>	
	<div class="cdetails">
	<span class="cdleft"> <?php $service = get_option('faith_service_time'); echo ($service); ?> </span>
	<span class="cdright"> <strong>Phone:</strong> <?php $phone = get_option('faith_church_phone'); echo ($phone); ?> &nbsp;&nbsp;<strong>Email:</strong> <?php $email = get_option('faith_church_email'); echo ($email); ?> &nbsp;&nbsp;<strong>Twitter:</strong> <?php $twit = get_option('faith_twit'); echo ($twit); ?></span>
	</div>
<?php } ?>			
</div>
	
</div><!--end masthead-->

