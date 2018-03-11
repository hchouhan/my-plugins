<?php

add_action( 'init', 'themeist_register_plugin_post_types_2' );

function themeist_register_plugin_post_types_2() {


	/* Plugin post type. */
	register_post_type( 'plugin',
		array(
			'public' => 		true,
			'publicly_queryable' =>	true,
			'show_in_nav_menus' =>	true,
			'show_in_admin_bar' => 	true,
			'exclude_from_search' =>	false,
			'hierarchical' => 		false,
			'has_archive' =>		 'plugins',
			'menu_position' => 		5,
			'query_var' => 		'plugin',
			'capability_type' => 	'post',

			'labels' => array(
				'name' => 		'My Plugins',
				'singular_name' => 	'Plugin',
				'menu_name' => 		'My Plugins',
				'add_new' => 		'Add New',
				'add_new_item' => 	'Add New Plugin',
				'edit_item' => 		'Edit Plugin',
				'new_item' => 		'New Plugin',
				'view_item' => 		'View Plugin',
				'search_items' => 		'Search Plugins',
				'not_found' => 		'No plugins found',
				'not_found_in_trash' => 	'No plugins found in Trash',
				'parent_item_colon' =>	null,
				'all_items' =>		'All Plugins',
			),
			'rewrite' => array(
				'slug' => 			'plugins/%plugin_category%',
				'with_front' => 		false,
				'feeds' =>		true,
			),
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'comments'
			)
		)
	);




}



?>