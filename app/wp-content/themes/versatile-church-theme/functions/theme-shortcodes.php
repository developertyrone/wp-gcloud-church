<?php



/*-----------------------------------------------------------------------------------



	Theme Shortcodes



-----------------------------------------------------------------------------------*/





/*-----------------------------------------------------------------------------------*/

/*	Column Shortcodes

/*-----------------------------------------------------------------------------------*/



function church_one_third( $atts, $content = null ) {

   return '<div class="one_third">' . do_shortcode($content) . '</div>';

}



add_shortcode('one_third', 'church_one_third');



function church_one_third_last( $atts, $content = null ) {

   return '<div class="one_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('one_third_last', 'church_one_third_last');



function church_two_third( $atts, $content = null ) {

   return '<div class="two_third">' . do_shortcode($content) . '</div>';

}



add_shortcode('two_third', 'church_two_third');



function church_two_third_last( $atts, $content = null ) {

   return '<div class="two_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('two_third_last', 'church_two_third_last');



function church_one_half( $atts, $content = null ) {

   return '<div class="one_half">' . do_shortcode($content) . '</div>';

}



add_shortcode('one_half', 'church_one_half');



function church_one_half_last( $atts, $content = null ) {

   return '<div class="one_half column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('one_half_last', 'church_one_half_last');



function church_one_fourth( $atts, $content = null ) {

   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';

}



add_shortcode('one_fourth', 'church_one_fourth');



function church_one_fourth_last( $atts, $content = null ) {

   return '<div class="one_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('one_fourth_last', 'church_one_fourth_last');



function church_three_fourth( $atts, $content = null ) {

   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';

}



add_shortcode('three_fourth', 'church_three_fourth');



function church_three_fourth_last( $atts, $content = null ) {

   return '<div class="three_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('three_fourth_last', 'church_three_fourth_last');



function church_one_fifth( $atts, $content = null ) {

   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';

}



add_shortcode('one_fifth', 'church_one_fifth');



function church_one_fifth_last( $atts, $content = null ) {

   return '<div class="one_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('one_fifth_last', 'church_one_fifth_last');



function church_two_fifth( $atts, $content = null ) {

   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';

}



add_shortcode('two_fifth', 'church_two_fifth');



function church_two_fifth_last( $atts, $content = null ) {

   return '<div class="two_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}

add_shortcode('two_fifth_last', 'church_two_fifth_last');



function church_three_fifth( $atts, $content = null ) {

   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';

}



add_shortcode('three_fifth', 'church_three_fifth');



function church_three_fifth_last( $atts, $content = null ) {

   return '<div class="three_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('three_fifth_last', 'church_three_fifth_last');



function church_four_fifth( $atts, $content = null ) {

   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';

}



add_shortcode('four_fifth', 'church_four_fifth');



function church_four_fifth_last( $atts, $content = null ) {

   return '<div class="four_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('four_fifth_last', 'church_four_fifth_last');



function church_one_sixth( $atts, $content = null ) {

   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';

}



add_shortcode('one_sixth', 'church_one_sixth');



function church_one_sixth_last( $atts, $content = null ) {

   return '<div class="one_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('one_sixth_last', 'church_one_sixth_last');



function church_five_sixth( $atts, $content = null ) {

   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';

}



add_shortcode('five_sixth', 'church_five_sixth');



function church_five_sixth_last( $atts, $content = null ) {

   return '<div class="five_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';

}



add_shortcode('five_sixth_last', 'church_five_sixth_last');





/*-----------------------------------------------------------------------------------*/

/*	Buttons

/*-----------------------------------------------------------------------------------*/





function church_button( $atts, $content = null ) {

	

	extract(shortcode_atts(array(

		'url'     	 => '#',

		'target'     => '_self',

		'style'   => 'white',

		'size'	=> 'small'

    ), $atts));

	

   return '<a class="button '.$size.' '.$style.'" href="'.$url.'">' . do_shortcode($content) . '</a>';

}



add_shortcode('button', 'church_button');





/*-----------------------------------------------------------------------------------*/

/*	Alerts

/*-----------------------------------------------------------------------------------*/





function church_alert( $atts, $content = null ) {

	

	extract(shortcode_atts(array(

		'style'   => 'white'

    ), $atts));

	

   return '<div class="alert '.$style.'">' . do_shortcode($content) . '</div>';

}



add_shortcode('alert', 'church_alert');





/*-----------------------------------------------------------------------------------*/

/*	Toggle Shortcodes

/*-----------------------------------------------------------------------------------*/



function church_toggle( $atts, $content = null ) {

	

    extract(shortcode_atts(array(

		'title'    	 => 'Title goes here',

		'state'		 => 'open'

    ), $atts));



	$out = '';

	

	$out .= "<div data-id='".$state."' class=\"toggle\"><h4>".$title."</h4><div class=\"toggle-inner\">".do_shortcode($content)."</div></div>";

	

    return $out;

	

}



add_shortcode('toggle', 'church_toggle');





/*-----------------------------------------------------------------------------------*/

/*	Tabs Shortcodes

/*-----------------------------------------------------------------------------------*/



function church_tabs( $atts, $content = null ) {

    extract(shortcode_atts(array(

        'tabs' => 'notabtitles'

    ), $atts));

    

    if( $tabs == 'notabtitles' ) { return; }

    

    $output = '';

    $output .= '<div class="tabs"><div class="tab-inner">';

	$output .= '<ul class="nav clearfix">';

    

    $myTabs = explode(',', $tabs);

    foreach($myTabs as $tab) {

        $nospacetab = strtolower(str_replace(' ', '_', trim($tab)));

        $output .= '<li><a href="#' . $nospacetab . '">' . $tab . '</a></li>';

    }

    

    $output .= '</ul>';

    $output .= '<div class="tab">';

    $myContent = do_shortcode($content);

    $output .= $myContent;

    $output .= '</div></div></div>';

    

    return $output;

}



add_shortcode('tabs', 'church_tabs');



function church_tabs_panes( $atts, $content = null ) {

    extract(shortcode_atts(array(

        'title' => 'notabletitle'

    ), $atts));

    

    if( $title == 'notabtitle' ) { return; }

    

    $nospacetab = trim(strtolower(str_replace(' ', '_', $title)));

    $output = '<div id="' . $nospacetab . '" class="tab_content">' . do_shortcode($content) . '</div>';

    

    return $output;

}



add_shortcode('tab', 'church_tabs_panes');





?>