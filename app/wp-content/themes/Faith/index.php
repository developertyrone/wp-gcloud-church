<?php get_header(); ?>
<?php if(get_option('faith_show_thought') == "true") { ?>	
<div class="sermlead">
<div class="sermin">	
<div class="sermtitl"><span>Thought of the day</span></div>
	<div class="sermbox">
	<span>
	<?php $thought = get_option('faith_thought'); echo stripslashes($thought); ?>
	</span>
	</div>
</div>
</div>
<?php } ?>
<div id="casing">

<div id="content">
<?php if(get_option('faith_show_about') == "true") { ?>	
<div id="about-box">
<h3><?php $about_title = get_option('faith_about_title'); echo ($about_title); ?></h3>
<img src="<?php $about_image = get_option('faith_about_image'); echo ($about_image); ?>" alt=""/>
<div class="about-text">
<?php $about_text = get_option('faith_about_text'); echo ($about_text); ?></div>
</div>
<?php } ?>
<div class="news-title"> Latest News </div>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="box clearfix" id="post-<?php the_ID(); ?>">

<div class="boxmeta">
<span class="author"> <?php the_author(); ?> </span>
<span class="time"> <?php the_time('M - j - Y'); ?> </span>
<span class="categ"> <?php the_category(', '); ?> </span>
</div>

<div class="boxim">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=120&amp;w=230&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" /></a>
<?php } ?>
</div>

<div class="boxentry">
<div class="btitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<?php wpe_excerpt('wpe_excerptlength_index', ''); ?>
<div class="clear"></div>
</div>

</div>

<?php endwhile; ?>

<div class="clear"></div>

<?php getpagenavi(); ?>

<?php else : ?>
		<h1 class="title">Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
  
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>