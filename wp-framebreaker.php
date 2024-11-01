<?php
/**
 * Plugin Name:	WP-Framebreaker
 * Plugin URI:	http://blog.ppfeufer.de/wordpress-plugin/wp-framebreaker/
 * Description:	Insert a JavaScript to blogs HTML-Head-Section to prevent from loading inside frames.
 * Version:	1.2
 * Author:	H.-Peter Pfeufer
 * Author URI:	http://blog.ppfeufer.de
 * License:	GPL
 */

/**
 * Copyright 2010  H.-Peter Pfeufer  (email: develop@ppfeufer.de)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License,
 * version 2, as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public
 * License along with this program; if not, write to the Free
 * Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston,
 * MA  02110-1301  USA
 */

if(!function_exists('wp_framebreaker')) {
	/**
	 * Inserts a javascript frame buster.
	 * @return void
	 */
	function wp_framebreaker() {
		$var_sScript = '<!-- Framebreaker by H.-Peter Pfeufer -->' . "\n";
		$var_sScript .= '<script type="text/javascript">' . "\n" . 'if (self != top) {' . "\n\t" . 'top.location.replace(self.location.href);' . "\n" . '}' . "\n" . '</script>' . "\n";
		$var_sScript .= '<!-- /Framebreaker by H.-Peter Pfeufer -->' . "\n";

		/**
		 * To alter the script output just use
		 * add_filter('wp_framebreaker', 'your_function');
		 */
		$var_sScript = apply_filters('wp_framebreaker', $var_sScript);

		echo $var_sScript;

		return;
	}
}

add_action('wp_head', 'wp_framebreaker');
?>