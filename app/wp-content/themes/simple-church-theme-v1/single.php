<?php get_header(); ?>

<!-- start container -->
<div id="container">
<div class="box">
	<div id="content">
		<!-- start leftcol -->
		<div id="leftcol">
			<div class="post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2 class="title"><?php the_title(); ?></h2>
				<div class="entry">
					<?php the_content(); ?>
				</div> <!-- //. entry -->
			<?php endwhile; ?>
			</div> <!-- //. post -->

			<?php endif; ?>

			<?php comments_template(); ?>

		</div>
		<!-- end leftcol -->
		<!-- start rightcol -->
		<div id="rightcol">
			<?php get_sidebar(); ?>
		</div>
		<!-- end rightcol -->
		<div class="clear"></div>
	</div>	
	<div class="clear"></div>
</div>
</div>
<!-- end container -->
<?php get_footer(); ?>