<?php
/*
	Template Name: Sermons
*/
?>
<?php get_header(); ?>

<div id="casing">

<div id="content">

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('post_type=sermons'.'&paged='.$paged);
?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
		
<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="postmeta">
<span class="speaker"> By <?php echo get_the_term_list( $post->ID, 'speaker', '', ' ', '' ); ?></span> 
<span>Topic : <?php echo get_the_term_list( $post->ID, 'topic', '', ' ', '' ); ?></span>
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