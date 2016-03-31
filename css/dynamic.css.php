<?php
header( 'Content-type: text/css' );

function ubs_query() {
	$args = array(
		'post_type' => 'bgswitch',
		'posts_per_page' => -1,
		'order' => 'ASC',
	);
	$bgs_query = get_posts( $args );

	$out = '';
	foreach ( $bgs_query as $entry ) {
		$source = wp_get_attachment_image_src( get_post_thumbnail_id( $entry->ID ) );
		$out .= 'body.'.$entry->post_title.' { background: url("' . $source[0] .'") repeat !important; }'."\n";
	}

	return $out;
}

echo ubs_query();
