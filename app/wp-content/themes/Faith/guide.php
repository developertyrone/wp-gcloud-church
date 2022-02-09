<?php
add_action('admin_menu', 't_guide');

function t_guide() {
	add_theme_page('How to use the theme', 'Theme user guide', 8, 'user_guide', 't_guide_options');
	
}

function t_guide_options() {
?>
<div class="wrap">

<h2>Theme user guide</h2>

<div class="opwrap">

<div id="wrapr" class="postbox-container" style="width: 70%; ">



<div class="postbox guidebox">

  <h3>License terms</h3>

<div class="inside">  <p> The PHP code of the theme is licensed under the GPL license as is WordPress itself. You can read it here: http://codex.wordpress.org/GPL. </p>
  <p> All other parts of the theme including, but not limited to the CSS code, images, and design are licensed for free personal usage.  </p>
  <p> You are requested to retain the credit banners on the template. </p>
  <p> You are allowed to use the theme on multiple installations, and to edit the template for your personal use. </p>
  <p> You are NOT allowed to edit the theme or change its form with the intention to resell or redistribute it. </p>  
  <p> You are NOT allowed to use the theme as a part of a template repository for any paid CMS service. </p>  </div>
  
  </div>
  
  
<div class="postbox guidebox">  <!-- Thumbnails --------------------->
  <h3>How to add featured thumbnail to posts?</h3>
  
	<div class="inside">  
	<p>Check the video below to see how to add featured images to posts. Theme uses timthumb script to generate thumbnail images. Make sure your host has PHP5 and GD library enabled. You will also need to set the CHMOD value for the "cache" folder <strong>within the theme</strong> to "777" or "755" </p>
	<div class="midcenter"><iframe src="http://www.screenr.com/embed/0IR" width="650" height="396" frameborder="0"></iframe></div>
	</div>
</div>	 						<!-- Thumbnails End ----------------->
	
<div class="postbox guidebox">  
	<h3> A walkthrough of Faith theme options</h3>

	<div class="inside">	
	<p>The following video shows a walkthrough of the various options available on the Faith theme. The home page has different modules that can be enabled or 
	disabled and customized via the options page.</p>
	<div class="midcenter"><iframe src="http://www.screenr.com/embed/yJls" width="650" height="396" frameborder="0"></iframe> </div>
	</div>
	
</div>


<div class="postbox guidebox">  
	<h3> How to make Sermon and Event Posts</h3>

	<div class="inside">	
	<p>The following video shows steps involved in creating "Sermon posts" and "Event posts".</p>
	<div class="midcenter"> <iframe src="http://www.screenr.com/embed/hQls" width="650" height="396" frameborder="0"></iframe></div>
	</div>
	
</div>



</div>

</div>

<?php }; ?>