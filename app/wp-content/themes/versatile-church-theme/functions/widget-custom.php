<?php
add_action( 'widgets_init', 'feat_page_load_widgets' );
function feat_page_load_widgets() {
	register_widget( 'Widget_Recent_Events' );
}
class Widget_Recent_Events extends WP_Widget {
	function Widget_Recent_Events() {
		$widget_ops = array('classname' => 'Widget_Recent_Events', 'description' => __( 'Upcoming Events','framework') );
		$this->WP_Widget('recent_events', __('Upcoming Events','framework'), $widget_ops);
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Upcoming Events','framework' ) : $instance['title'], $instance, $this->id_base);
		$feat_query = array('post_type'=>'events','meta_key' => 'events_datetime',
     'orderby' => 'meta_value',
     'posts_per_page' => -1,
     'order' => 'ASC'); ?><?php 
		$feat_posts = new WP_Query();
		$feat_posts->query($feat_query); $i=1;
		echo $before_widget;
			if ( $title){
				echo $before_title . $title . $after_title;}else { 'Upcoming Events'; }
		if ($feat_posts->have_posts()) { 
				echo '<ul>';
			while ($feat_posts->have_posts()&&($i<=5)) : $feat_posts->the_post();
				$meta = get_post_meta(get_the_ID(), 'events_datetime', true );
	$ss = date('U'); if($meta>$ss): 
	 $i++;
echo '<li><strong><a href="'. get_permalink().'">'.get_the_title().'</a></strong><br /> Date: '; ?> <?php echo date('F j, Y',$meta).'<br /> Time: '. date('h:i A',$meta).'<br /> Location: '.get_post_meta(get_the_ID(),'events_location',true).'</li>';
			//endif;
		endif; endwhile; wp_reset_query(); echo '</ul>';
			echo $after_widget;
		}
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	function form( $instance ) {
		$title = esc_attr( $instance['title'] );
	?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:','framework'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php } } ?>
<?php
add_action( 'widgets_init', 'feat_page_widgets' );
function feat_page_widgets() {
	register_widget( 'Widget_Recent_Sermons' );
}
class Widget_Recent_Sermons extends WP_Widget {
	function Widget_Recent_Sermons() {
		$widget_ops = array('classname' => 'Widget_Recent_Sermons', 'description' => __( 'Recent Sermons','framework') );
		$this->WP_Widget('recent_sermons', __('Recent Sermons','framework'), $widget_ops);
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Recent Sermons','framework' ) : $instance['title'], $instance, $this->id_base);
		$feat_query = array(
			'posts_per_page'=>5,
			'post_type' => 'sermon'
		);
		$feat_posts = new WP_Query();
		$feat_posts->query($feat_query);
		echo $before_widget;
			if ( $title){
				echo $before_title . $title . $after_title;} else { 'Recent Sermons'; }
		if ($feat_posts->have_posts()) { 
				echo '<ul>';
			while ($feat_posts->have_posts()) : $feat_posts->the_post();
		echo '<li><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong><br />Date: '.get_the_time('F j, Y').'<br />Speaker: '.get_post_meta(get_the_ID(),'media_speaker',true).'<br />'.get_the_term_list( $post->ID, 'media_tags', 'Tags: ', ', ', '' ).'</li>';
			endwhile; echo '</ul>';
			echo $after_widget;
		}
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	function form( $instance ) {
		$title = esc_attr( $instance['title'] );
	?>
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title:','framework'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php } } ?>