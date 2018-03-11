<?php

add_action( 'init', 'themeist_register_plugin_post_types' );

function themeist_register_plugin_post_types() {


	/* Plugin post type. */
	register_post_type( 'plugins',
		array(
			'public' => 		true,
			'publicly_queryable' =>	true,
			'show_in_nav_menus' =>	true,
			'show_in_admin_bar' => 	true,
			'exclude_from_search' =>	false,
			'hierarchical' => 		false,

			'has_archive' =>		 'plugins',
			'query_var' => true,
			'capability_type' => 	'post',
			'menu_position' => 		5,

			'labels' => array(
				'name' => 		'My Plugins',
				'singular_name' => 	'Plugin',
				'menu_name' => 		'My Plugins',
				'add_new' => 		'Add New',
				'add_new_item' => 	'Add New Plugin',
				'edit' => __( 'Edit Plugin' ),
				'edit_item' => 		'Edit Plugin',
				'new_item' => 		'New Plugin',
				'view' => __( 'View Plugin' ),
				'view_item' => 		'View Plugin',
				'search_items' => 		'Search Plugins',
				'not_found' => 		'No plugins found',
				'not_found_in_trash' => 	'No plugins found in Trash',
				'parent_item_colon' =>	null,
				'all_items' =>		'All Plugins',
			),

			// this sets where the Themes section lives and contains a tag to insert the Platform in URL below
			// this can be any depth e.g. themes/%theme_platform%
			'rewrite' => array(
				'slug' => 			'plugins/%plugin_category%',
				'with_front' => 		false,
				'feeds' =>		true,
			),

			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'comments'
			),
		)
	);


}


	add_filter('post_type_link', 'plugins_permalink_filter_function', 1, 3);
	function plugins_permalink_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
		if ( strpos('%plugin_category%', $post_link) === 'FALSE' ) {
		  return $post_link;
		}
		$post = get_post($id);
		if ( !is_object($post) || $post->post_type != 'plugins' ) {
		  return $post_link;
		}
		// this calls the term to be added to the URL
		$terms = wp_get_object_terms($post->ID, 'plugin_category');
		if ( !$terms ) {
		  return str_replace('plugins/%plugin_category%/', '', $post_link);
		}
		return str_replace('%plugin_category%', $terms[0]->slug, $post_link);
	}

?>