<!-- start footer -->
<div id="footer">
<div class="box">
	<!-- footer left -->
    <div id="footer_left">
    	<!-- nav -->
        <div id="footer_nav">
    		<?php wp_nav_menu (array ( 'theme_location' => 'footer-menu', 'depth' => 0) ); ?>
        </div>
        <!-- nav -->
        <!-- black -->
        <div id="footer_black">
        	<?php echo get_option( 'church_address' ); ?> <?php if ( get_option( 'church_twitter' ) <> "" ) { ?><span><?php _e('Phone: ', churchthemes); ?><?php echo get_option( 'church_phone' ); ?></span>	<?php } ?>
        </div>
        <!-- black -->
    </div>
    <!-- footer left -->
    <!-- footer right -->
    <div id="footer_right">
    <?php if ( get_option( 'church_twitter' ) <> "" ) { ?><a href="<?php echo get_option( 'church_twitter' ); ?>" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/ico_tw.png" alt="Twitter icon" /></a><?php } ?>
				<?php if ( get_option( 'church_facebook' ) <> "" ) { ?><a href="<?php echo get_option( 'church_facebook' ); ?>" title="Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/ico_fb.png" alt="Facebook icon" /></a><?php } ?>
    	<?php bloginfo('title'); ?>
    </div>
    <!-- footer right -->
</div>
</div>
<!-- end footer -->

<?php wp_footer(); ?>

<?php if ( get_option('church_google_analytics') <> "" ) { echo stripslashes(get_option('church_google_analytics')); } ?>

</body>
</html>