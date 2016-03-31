<?php
/*
Plugin Name: User Background Switcher
Version: 0.1
Description: Adds widget to let the user decide, which background he prefers
Author: Bego Mario Garde
Author URI: https://pixolin.de
License: GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:  /languages
Text Domain:  ubs

(c) Bego Mario Garde, 2016
Scroll to Anchor is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Scroll to Anchor is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Scroll to Anchor. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

defined( 'ABSPATH' ) or die( 'Good bye.' );

// retrieve plugin path
$ubs_plugin_path = plugin_dir_path( __FILE__ );

//Localize
add_action( 'plugins_loaded', 'ubs_load_textdomain' );

if ( ! function_exists( 'ubs_load_textdomain' ) ) {
	function ubs_load_textdomain() {
		load_plugin_textdomain( 'ubs', false, plugin_basename( dirname( __FILE__ ) ).'/languages' );
	}
}

// Enqueue JS
require_once $ubs_plugin_path .'/includes/ubs-enqueue-scripts.php';

// Add Widget
require_once $ubs_plugin_path .'/includes/ubs-widget.php';

// Add Settings
require_once $ubs_plugin_path . '/settings/ubs-settings.php';

// Add Custom Post Type for Background–CSS-Class pairs
require_once $ubs_plugin_path . '/includes/ubs-background-cpt.php';
