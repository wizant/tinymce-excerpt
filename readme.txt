=== TinyMCE Excerpt ===
Contributors: simonwheatley
Donate link: http://www.simonwheatley.co.uk/wordpress-plugins/
Tags: tinymce, rich text editor, excerpt
Requires at least: 2.2.3
Tested up to: 2.3
Stable tag: 1.2

Enables rich text editing on the excerpt field.

== Description ==

This is a simple plugin that enables rich text editing on the excerpt field.

If you have any plugins installed which alter TinyMCE, e.g. to add additional 
buttons, they will also be applied to the excerpt editor.

Any issues: [contact me](http://www.simonwheatley.co.uk/contact-me/).

== Change Log ==

= v1.2 2007/11/23 =

* Fix: Thanks to [Jascha Ephraim](http://www.jaschaephraim.com/) for spotting 
and providing code to fix an issue where the excerpt content wasn't 
auto-paragraphised. It is now.

==Known issues==

* You can’t send images to the excerpt editor from the edit page file browser; 
you have to send them to the main editor, then copy and paste.
* To show the excerpt you have to use a template which uses 
[the_excerpt](http://codex.wordpress.org/Template_Tags/the_excerpt), rather 
than [the_content](http://codex.wordpress.org/Template_Tags/the_content).

== Installation ==

1. Upload `tinymce_excerpt.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Edit a post and enjoy the new rich styles in your excerpts

== Screenshots ==

1. Showing the TinyMCE Editor on the optional excerpt field, ready for editing.
