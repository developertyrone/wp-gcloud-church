<!-- start footer -->
<div id="footer">
	<div class="box">
		<!-- start left -->
		<div id="footer_left">
			<strong><a href="<?php bloginfo('home'); ?>" title="<?php bloginfo('title'); ?>"><?php bloginfo('title'); ?></a></strong>
		</div>
		<!-- end left -->
		<!-- start right -->
		<div id="footer_right">
			<?php wp_nav_menu (array ( 'theme_location' => 'footer-menu', 'depth' => 0) ); ?>
		</div>
		<!-- end right -->
	</div>
</div>
<!-- end footer -->

<?php wp_footer(); ?>
<?php if ( get_option('church_google_analytics') <> "" ) { echo stripslashes(get_option('church_google_analytics')); } ?>

</body>
</html>