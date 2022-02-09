<?php
/*
 * 404 Template
*/

$pagedata	= get_page($dummy=133);

get_header(); ?>

<div class="clear"></div>
		<!-- start content -->
		<div id="content">
			<!-- start common1 -->
			<div class="post">
				<h1 class="title"><?=$pagedata->post_title?></h1>
				<div class="clear"></div>
				<div class="entry">
					<p><?=str_ireplace("\n", '</p><p>', $pagedata->post_content)?></p>
				</div><!-- /.entry -->
				<div class="clear"></div>
			</div><!-- /.post -->
		</div>
		<!-- end content -->
		<div class="clear"></div>
	</div>
	<!-- end box -->
</div>
<!-- end wrap -->
</div>
<!-- end container -->
<?php get_footer(); ?>