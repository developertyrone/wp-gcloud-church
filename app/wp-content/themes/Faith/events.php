<?php
/*
	Template Name: Events
*/
?>
<?php get_header(); ?>

<div id="casing">

<div id="content">

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('post_type=events'.'&paged='.$paged);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
		
<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="postmeta">
<span class="speaker">At <?php $eventlocation=get_post_meta($post->ID, 'wtf_event-location', true); echo $eventlocation; ?></span> 
<span> on <?php $eventdate=get_post_meta($post->ID, 'wtf_event-date', true); echo $eventdate; ?> <?php $eventtime=get_post_meta($post->ID, 'wtf_event-time', true); echo $eventtime; ?></span>
</div>

<div class="entry">
<?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
<div class="clear"></div>
</div>

</div>
<?php endwhile; ?>

<div class="clear"></div>

<?php getpagenavi(); ?>

<?php $wp_query = null; $wp_query = $temp;?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>