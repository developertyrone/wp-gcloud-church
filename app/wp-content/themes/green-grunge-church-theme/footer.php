<!-- start footer -->
    <div id="footer">
    	<!-- left -->
        <div id="footer_left">
        	<strong><?php bloginfo('title'); ?></strong><br />
		<?php echo get_option( 'church_address1' ); ?><br />
		<?php echo get_option( 'church_address2' ); ?><br />
		<?php echo get_option( 'church_address3' ); ?>
        </div>
        <!-- left -->
        <!-- start navigation -->
        <div id="footer_right" class="navigation">
        	<?php wp_nav_menu (array ( 'theme_location' => 'footer-menu', 'depth' => 0) ); ?>
        </div>
        <!-- end navigation -->
    <div class="clear"></div>
    </div>
    <!-- end footer -->
</div>
<!-- end box -->

<?php wp_footer(); ?>
<?php if ( get_option('church_google_analytics') <> "" ) { echo stripslashes(get_option('church_google_analytics')); } ?>

</body>
</html>