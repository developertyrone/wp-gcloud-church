<?php ob_start();

header('Content-type: text/css;charset:UTF-8');



if(file_exists('../../../../wp-load.php')) :

	include '../../../../wp-load.php';

else:

	include '../../../../../wp-load.php';

endif; 

?>



/*==========================================================================================
This file contains styles related to the color scheme of the theme
==========================================================================================*/

body {

	background:<?php echo get_option('church_bodybg'); ?>;

	color:#333;

}

#header-bg {

	background:<?php echo get_option('church_headerbg'); ?>;

}

.slider-wrapper{

	background:<?php echo get_option('church_sliderbg'); ?>;

}

#showcase{

	border-bottom-color:<?php echo get_option('church_borders'); ?>;

}

.slider-wrapper{

	border-color:<?php echo get_option('church_borders'); ?>;

}

.post.listing {

	border-bottom-color:<?php echo get_option('church_borders'); ?>;

}

.thumb {

	border-color:<?php echo get_option('church_borders'); ?>;

}

.widget .input, .widget input[type="text"] {

	border-color:<?php echo get_option('church_borders'); ?>;

}

#comments li {

	border-bottom-color:<?php echo get_option('church_borders'); ?>;

}

#comments ol ul {

	border-top-color:<?php echo get_option('church_borders'); ?>;

}

#comments li li {

	border-top-color:<?php echo get_option('church_borders'); ?>;

}

#respond .input{

	borde-color:<?php echo get_option('church_borders'); ?>;

}

#respond .textarea{

	border-color:<?php echo get_option('church_borders'); ?>;

}

#footer {

	background:<?php echo get_option('church_footerbg'); ?>;

	border-top-color:<?php echo get_option('church_borders'); ?>;

}

#navigation {

	background:<?php echo get_option('church_navbg'); ?>;

	border-bottom-color:<?php echo get_option('church_navborder'); ?>;

}

#navigation ul ul { 

	background:<?php echo get_option('church_navborder'); ?>;

}

#navigation a, #navigation ul li:hover li a, #navigation li.current-menu-item li a {

	color:<?php echo get_option('church_navlinks'); ?>;

}

#navigation a:hover, #navigation li.current-menu-item a, #navigation li.current-menu-parent a, #navigation ul li li a:hover, #navigation li.current-menu-item li a:hover, #navigation li li.current-menu-item a, #navigation li:hover li.current-menu-item a{

	color:<?php echo get_option('church_navlinkshover'); ?>;

}

#logo, #logo a {

	color:<?php echo get_option('church_sitetitle'); ?>;

}

a.button1 {

	background-color:<?php echo get_option('church_directionbuttonbg'); ?>;

}

a.button1:hover {

	background-color:<?php echo get_option('church_directionbuttonbghover'); ?>;

}

a {

	color:<?php echo get_option('church_defaultlink'); ?>;

}

a:hover {

	color:<?php echo get_option('church_defaultlinkhover'); ?>;

}

.theme-default .nivo-controlNav a {

	background:<?php echo get_option('church_slidercontrol'); ?>;

	border-color:<?php echo get_option('church_borders'); ?>;

}

.theme-default .nivo-controlNav a.active{

	background:<?php echo get_option('church_activeslidercontrol'); ?>;

}

body{

	color:<?php echo get_option('church_bodytext'); ?>;

}

h1, h2, h3 ,h4 ,h5, h6, h1 a, h2 a, h3 a ,h4 a ,h5 a, h6 a {

	color:<?php echo get_option('church_headers'); ?>;

}

.widget .button, .widget input[type="submit"] {

	background:<?php echo get_option('church_defaultbuttons'); ?>;

	color:<?php echo get_option('church_defaultbuttontext'); ?>;

}

.widget .button:hover, .widget input:hover[type="submit"] {

	background-color:<?php echo get_option('church_defaultbuttonshover'); ?>;

}

#respond .button {

	background:<?php echo get_option('church_defaultbuttons'); ?>;

	color:<?php echo get_option('church_defaultbuttontext'); ?>;

}

#respond .button:hover {

	background:<?php echo get_option('church_defaultbuttonshover'); ?>;

}

<?php ob_flush(); ?>