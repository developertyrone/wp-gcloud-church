<?php get_header(); ?>
<div id="casing">
<div id="singlecontent" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="entry">

<div class="sermonbox clearfix">
	<img class="sermthumb" src="<?php $photo=get_post_meta($post->ID, 'wtf_sermon-speaker', true); echo $photo; ?>" width="80" height="80" alt=""/>
	<span class="speaker"> By <?php echo get_the_term_list( $post->ID, 'speaker', '', ' ', '' ); ?></span>
	<span>Verse : <?php $verse=get_post_meta($post->ID, 'wtf_sermon-verse', true); echo $verse; ?></span>
	<span>Topic : <?php echo get_the_term_list( $post->ID, 'topic', '', ', ', '' ); ?></span>
	<?php include (TEMPLATEPATH . '/lib/player.php'); ?>
</div>
<?php the_content('Read the rest of this entry &raquo;'); ?>

<div class="clear"></div>
<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>


</div>

<?php comments_template(); ?>
<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>