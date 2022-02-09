<!DOCTYPE html>
<!-- BEGIN html -->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<!-- BEGIN head -->
<head>
	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
	<!-- Title -->
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<!-- Stylesheets -->

    	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700italic,700,400italic' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

	<!-- RSS & Pingbacks -->

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (get_option('church_feedburner')) { echo get_option('church_feedburner'); } else { bloginfo( 'rss2_url' ); } ?>">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


    	<!-- Theme Hook -->

	<?php wp_head(); ?>

	<!--[if lte IE 7]>

    		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" type="text/css" media="screen">

    	<![endif]-->
	
<!-- END head -->
</head>

<body>

<!-- Start Wrapper -->

<section class="wrapper">

<!-- start navigation -->

<nav id="navigation">

	<section class="container">

    	<section class="columns sixteen">

	<section class="style-select">

    <?php if ( has_nav_menu( 'header-menu' ) ) { ?>

    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

    <?php } else { $primary_exclude = get_option('church_primary_nav_exclude'); ?>

        <ul>

            <?php wp_list_pages( array( 'exclude' => $primary_exclude, 'title_li' => '', 'sort_column' => get_option('church_primary_nav_order') )); ?>

        </ul>

    <?php } ?>

	</section>

        <div class="clear"></div>

    </section>

    </section>

</nav>

<!-- end navigation -->

<section id="header-bg">

<!-- start header -->

<header id="header">

	<section class="container">

    	<!-- logo -->

        <section class="columns eight" id="logo">

            <?php if (get_option('church_logo')) { ?>

            <div><span><a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('church_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a></span></div><?php } else { ?>

		<div><span><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></span></div><?php } ?>

        </section>

        <!-- logo -->

      	<!-- button -->

        <section class="columns eight">

        	<?php if(get_option('church_map')<>''){ ?><a href="http://maps.google.com/?q=<?php echo get_option('church_map'); ?>" title="Map &amp; Directions" target="_blank" class="button1">Map &amp; Directions</a><?php } ?>

      	</section>

        <!-- button -->

    </section>

</header>

<!-- end header -->