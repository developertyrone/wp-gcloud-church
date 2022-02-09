<section class="push"></section>

</section>

<!-- End Wrapper -->

<!-- start footer -->

<footer id="footer">

	<section class="container">

    	<!-- left -->

		<section class="columns five">

			<p><?php bloginfo('name'); ?></p>

        </section>

        <!-- left -->

        <!-- right -->

		<section class="columns eleven">

			<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>

    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

    <?php } else { $primary_exclude = get_option('church_primary_nav_exclude'); ?>

        <ul>

            <?php wp_list_pages( array( 'exclude' => $primary_exclude, 'title_li' => '', 'sort_column' => get_option('church_primary_nav_order') )); ?>

        </ul>

    <?php } ?>

        </section>

        <!-- right -->

	</section>

</footer>

<!-- end footer -->

<?php wp_footer(); ?>		

<!--END body-->

</body>

<!--END html-->

</html>