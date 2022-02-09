<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ChurchThemes
 *
 ===================================================================================================
 WARNING! DO NOT EDIT THIS FILE OR ANY TEMPLATE FILES IN THIS THEME!

 To make it easy to update your theme, you should not edit this file. Instead, you should create a
 Child Theme first. This will ensure your template changes are not lost when updating the theme.

 You can learn more about creating Child Themes here: http://codex.wordpress.org/Child_Themes

 You have been warned! :)
 ===================================================================================================
 */

get_header(); ?>
		<div id="ribbon" class="page">
			<div class="container_12 content">
				<div class="grid_12 alpha">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
		<div id="wrapper3" class="container_12">
			<div id="content" class="grid_8 alpha">
<?php get_template_part('loop');?>
			</div>
<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>