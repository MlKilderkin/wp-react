<?php

add_action( 'wp_enqueue_scripts', 'twenty_twenty_child_styles_enqueue' );
add_action( 'after_setup_theme', 'twenty_twenty_child_hide_admin_bar' );

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

function twenty_twenty_child_hide_admin_bar() {
	// Skip if it is admin, user not logged in or it is not an editor user
	if ( is_admin() || ! is_user_logged_in() || ! is_editor_user() ) {
		return;
	}

	global $current_user;

	if ( $current_user->user_login !== 'wp-test' ) {
		return;
	}

	show_admin_bar(false);
}

function is_editor_user() {
	global $current_user;

	foreach ( $current_user->roles as $role ) {
		if ( $role === 'editor' ) {
			return true;
		}
	}

	return false;
}
