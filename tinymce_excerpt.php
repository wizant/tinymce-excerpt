<?php
/*
Plugin Name: TinyMCE Excerpt
Plugin URI: http://www.simonwheatley.co.uk/wordpress-plugins/tinymce-excerpt/
Description: Use Tiny MCE for the excerpt while editing the excerpt.
Version: 1.3
Author: Simon Wheatley
Author URI: http://www.simonwheatley.co.uk/


= v1.3 2008/04/08 =

* Fix: Now works with WordPress 2.5. Thanks to [J Bradford Dillon](http://www.jbradforddillon.com/web-development/tinymce-excerpt-for-25/) 
for reporting the issue & providing some code. Retains backwards compatibility for previous versions of WordPress.

= v1.2 2007/11/23 =

* Fix: Thanks to [Jascha Ephraim](http://www.jaschaephraim.com/) for spotting 
and providing code to fix an issue where the excerpt content wasn't 
auto-paragraphised. It is now.

v1.1 - Safer use of jQuery, through the jQuery var itself. There's an awful lot of 
scripting going on in the edit pages.

Copyright 2007 Simon Wheatley

This script is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This script is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

// JQ JS to add the class 'mceEditor' to the excerpt textarea
function tme_convert_excerpt_js()
{
	echo "\n";
	echo '<script type="text/javascript">';
	echo "\n";
	echo '/* <![CDATA[ */';
	echo "\n// JQ JS to add the class 'mceEditor' to the excerpt textarea pre WP 2.5\n";
	echo 'jQuery(document).ready( function () { jQuery("#excerpt").addClass("mceEditor"); } ); if ( typeof tinyMCE.execCommand == "function" ) tinyMCE.execCommand("mceAddControl", false, "excerpt");';
	echo "\n";
	echo '/* ]]> */';
	echo "\n";
	echo '</script>';
	echo "\n";
}

// Enqueue script files, for inclusion by the standard WP magic
function tme_admin_enqueue_js()
{
	global $editing;
	if ( $editing && user_can_richedit() ) {
		wp_enqueue_script('jquery'); // Probably there anyway, but best to be sure
	}
}

// Quick CSS make our new excerpt editor even more lovelier
function tme_admin_css()
{
	global $editing;
	if ( $editing && user_can_richedit() ) {
		// Fix the CSS, so the resize icon appears hard against the far right of the TinyMCE status bar.
		echo "<style type='text/css'> #postexcerpt .mceStatusbarResize { margin-right: 0; } </style>";
	}
}

// Hook it up to Wordpress

// We need to enqueue some scripts. This is not an ideal action 
// hook, but it does the business
add_action('admin_xml_ns', 'tme_admin_enqueue_js');
// Paragraphise the excerpt on save
add_filter('edit_post_excerpt', 'wpautop');
// Some CSS
add_action('admin_head', 'tme_admin_css');
// Some inline JS in the head, to avoid loading another file
add_action('admin_head', 'tme_convert_excerpt_js');

?>