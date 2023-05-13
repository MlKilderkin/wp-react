<?php

add_action( 'init', 'twenty_twenty_child_register_products_cpt' );
add_action( 'init', 'twenty_twenty_child_register_products_taxonomies' );

function twenty_twenty_child_register_products_cpt() {
	$labels =[
		'name'               => _x( 'Products', 'post type general name', 'twenty-twenty-child' ),
		'singular_name'      => _x( 'Product', 'post type singular name', 'twenty-twenty-child' ),
		'add_new'            => _x( 'Add New', 'post type singular name', 'twenty-twenty-child' ),
		'add_new_item'       => __( 'Add New Product', 'twenty-twenty-child' ),
		'edit_item'          => __( 'Edit Product', 'twenty-twenty-child' ),
		'new_item'           => __( 'New Product', 'twenty-twenty-child' ),
		'all_items'          => __( 'All Products', 'twenty-twenty-child' ),
		'view_item'          => __( 'View Product', 'twenty-twenty-child' ),
		'search_items'       => __( 'Search Products', 'twenty-twenty-child' ),
		'not_found'          => __( 'No products found', 'twenty-twenty-child' ),
		'not_found_in_trash' => __( 'No products found in the Trash', 'twenty-twenty-child' ),
		'menu_name'          => __( 'Products', 'twenty-twenty-child' ),
	];

	register_post_type( 'products', [
		'labels'       => $labels,
		'hierarchical' => false,
		'label' 	   => esc_html__( 'Products', 'twenty-twenty-child' ),
		'supports'     => [
			'title',
			'editor',
			'thumbnail',
			'excerpt',
		],
		'show_in_menu' => true,
		'show_ui' 	   => true,
		'show_in_rest' => true,
		'has_archive'  => true,
	] );
}

function twenty_twenty_child_register_products_taxonomies() {
	$labels = [
		'name'              => _x( 'Product Categories', 'taxonomy general name', 'twenty-twenty-child' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name', 'twenty-twenty-child' ),
		'search_items'      => __( 'Search Product Categories', 'twenty-twenty-child' ),
		'all_items'         => __( 'All Product Categories', 'twenty-twenty-child' ),
		'parent_item'       => __( 'Parent Product Category', 'twenty-twenty-child' ),
		'parent_item_colon' => __( 'Parent Product Category:', 'twenty-twenty-child' ),
		'edit_item'         => __( 'Edit Product Category', 'twenty-twenty-child' ),
		'update_item'       => __( 'Update Product Category', 'twenty-twenty-child' ),
		'add_new_item'      => __( 'Add New Product Category', 'twenty-twenty-child' ),
		'new_item_name'     => __( 'New Product Category', 'twenty-twenty-child' ),
		'menu_name'         => __( 'Product Categories', 'twenty-twenty-child' ),
	];

	register_taxonomy( 'product_category', 'products', [
		'labels'	   => $labels,
		'hierarchical' => true,
	] );
}
