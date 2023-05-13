<?php

add_action( 'wp_enqueue_scripts', 'twenty_twenty_child_styles_enqueue' );

function twenty_twenty_child_styles_enqueue() {
	$parent_handle = 'twentytwenty-style';
	$theme        = wp_get_theme();

	wp_enqueue_style( $parent_handle,
		get_template_directory_uri() . '/style.css',
		[],
		$theme->parent()->get( 'Version' )
	);

	wp_enqueue_style( 'twenty-twenty-child',
		get_stylesheet_uri(),
		[ $parent_handle ],
		$theme->get( 'Version' )
	);
}
