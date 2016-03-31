<?php
/*
 * Uninstall routine to delete the options for Background Switcher
 */

// If uninstall is not called from WordPress, exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option( 'ubs-options' );

// Thank you for using my plugin. <3
