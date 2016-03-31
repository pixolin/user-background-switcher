<?php

add_action( 'admin_menu', 'ubs_settings_menu' );

function ubs_settings_menu() {
	add_submenu_page(
		$parent_slug = 'options-general.php',
		$page_title = 'User Background Switcher',
		$menu_title = 'Background Switcher',
		$capability = 'manage_options',
		$menu_slug = 'background-switcher',
		$function = 'ubs_settings'
	);
}

function ubs_settings() {
	echo 'hello dolly :P';
}
