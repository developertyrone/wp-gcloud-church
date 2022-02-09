<?php



/*-----------------------------------------------------------------------------------*/

/*	Paths Defenitions

/*-----------------------------------------------------------------------------------*/



define('church_TINYMCE_PATH', church_FILEPATH . '/tinymce');

define('church_TINYMCE_URI', church_DIRECTORY . '/tinymce');





/*-----------------------------------------------------------------------------------*/

/*	Load TinyMCE dialog

/*-----------------------------------------------------------------------------------*/



require_once( church_TINYMCE_PATH . '/tinymce.class.php' );		// TinyMCE wrapper class

new church_tinymce();											// do the magic



?>