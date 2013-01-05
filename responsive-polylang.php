<?php
/*
 * Plugin Name: Polylang for Responsive theme
 * Plugin URI: https://github.com/grappler/responsive-polylang
 * Description: Add the Responsive Theme Homepage strings to Polylang
 * Version: 1.0
 * Author: CHOUBY, Ulrich Pogson
 * Author URI: http://ulrich.pogson.ch
 * License: GPL2+
 */

 // Credit CHOUBY
 // http://pastebin.com/0Aw0wDaD

add_action('admin_init', create_function('', 'get_option("responsive_theme_options");')); // to call the option filter on admin side
add_filter('option_responsive_theme_options', 'translate_responsive_theme_strings');

function translate_responsive_theme_strings($options) {
	if (function_exists('pll_register_string')) { // test polylang is activated
		$strings = array('home_headline',  'home_subheadline', 'home_content_area', 'cta_text',  'cta_url', 'featured_content');
		foreach ($strings as $str) {
			if (is_admin())
				pll_register_string('Responsive Theme Options', $options[$str]);
			else
				$options[$str] = pll__($options[$str]);
		}
	}
	return $options;
}