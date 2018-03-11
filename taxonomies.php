<?php

add_action( 'init', 'themeist_register_plugin_taxonomies' );

function themeist_register_plugin_taxonomies() {

	/* Plugin type taxonomy. */
	register_taxonomy(
		'plugin_category',
		array(
			'plugins'
		),
		array(
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'hierarchical' => false,
			'query_var' => true,

			'labels' => array(
				'name' => 			'Plugin Categories',
				'singular_name' => 		'Plugin Category',
				'menu_name' =>			'Plugin Categories',
				'search_items' => 			'Search Plugin Categories',
				'popular_items' => 			'Popular Plugin Categories',
				'all_items' => 			'All Plugin Categories',
				'parent_item' => 			null,
				'paent_item_colon' => 		null,
				'edit_item' => 			'Edit Plugin Category',
				'view_item' => 			'View Plugin Category',
				'update_item' => 			'Update Plugin Category',
				'add_new_item' => 		'Add New Plugin Category',
				'new_item_name' => 		'New Plugin Category Name',
				'separate_items_with_commas' => 	'Separate types with commas',
				'add_or_remove_items' => 		'Add or remove categories',
				'choose_from_most_used' => 	'Choose from the most used categories',
			),

			// this sets the taxonomy view URL (must have category base i.e. /platform)
			// this can be any depth e.g. themeist.co/plugins/platform
			'rewrite' => array(
				'with_front' => 		false,
				'slug' => 			'plugins'
			),
		)
	);


}


?>