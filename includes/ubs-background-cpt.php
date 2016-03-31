<?php

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Custom Backgrounds', 'Post Type General Name', 'ubs' ),
		'singular_name'         => _x( 'Custom Background', 'Post Type Singular Name', 'ubs' ),
		'menu_name'             => __( 'Backgrounds', 'ubs' ),
		'name_admin_bar'        => __( '', 'ubs' ),
		'archives'              => __( '', 'ubs' ),
		'parent_item_colon'     => __( '', 'ubs' ),
		'all_items'             => __( 'All Backgrounds', 'ubs' ),
		'add_new_item'          => __( 'Add New Background', 'ubs' ),
		'add_new'               => __( 'Add New', 'ubs' ),
		'new_item'              => __( 'New Background', 'ubs' ),
		'edit_item'             => __( 'Edit Background', 'ubs' ),
		'update_item'           => __( 'Update Background', 'ubs' ),
		'view_item'             => __( 'View Background', 'ubs' ),
		'search_items'          => __( 'Search Background', 'ubs' ),
		'not_found'             => __( 'Not found', 'ubs' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ubs' ),
		'featured_image'        => __( 'Background Image', 'ubs' ),
		'set_featured_image'    => __( 'Set background image', 'ubs' ),
		'remove_featured_image' => __( 'Remove background image', 'ubs' ),
		'use_featured_image'    => __( 'Use as background image', 'ubs' ),
		'insert_into_item'      => __( '', 'ubs' ),
		'uploaded_to_this_item' => __( '', 'ubs' ),
		'items_list'            => __( 'Background list', 'ubs' ),
		'items_list_navigation' => __( 'Backgrounds list navigation', 'ubs' ),
		'filter_items_list'     => __( 'Filter backgrounds list', 'ubs' ),
	);

	$args = array(
		'label'                 => __( 'Custom Background', 'ubs' ),
		'description'           => __( 'Custom Background', 'ubs' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 80,
		'menu_icon'             => 'dashicons-format-image',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => false,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'bgswitch', $args );

}
add_action( 'init', 'custom_post_type', 0 );
