<?php
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
?>

<?php get_header(); ?>
</section>
<!-- End Header bg -->
<!-- start container -->
<section id="container">
	<section class="container">
    	<!-- start leftcol -->
            <section class="eleven columns" id="leftcol">
            	<!-- start post -->
                <article class="post" id="post-0">
                <h2 class="page-title"><?php _e('Error 404 - Not Found', 'framework') ?></h2>
                    <!-- entry -->
                    <section class="entry">
                        <p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                    </section>
                    <!-- entry -->
                </article>
                <!-- end post -->
            </section>
            <!-- end leftcol -->
		<!-- start rightcol -->
            <aside class="five columns" id="rightcol">
                <?php get_sidebar(); ?>
            </aside>
            <!-- end rightcol -->
		<div class="clear"></div>
  	</section>
</section>
<!-- end container -->
<?php get_footer(); ?>