<?php

add_action( 'init', 'themeist_register_plugin_post_types' );

function themeist_register_plugin_post_types() {


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
			// 'map_meta_cap' =>	 true,
			/* Caps: 'manage_plugin_posts', 'publish_plugin_posts', 'edit_plugin_posts' */
/*			'capabilities' => array(
				// meta caps
				'edit_post' => 		'edit_plugin_post',
				'read_post' => 		'read_plugin_post',
				'delete_post' => 		'delete_plugin_post',
				// primitive caps used outside of map_meta_cap()
				'edit_posts' => 		'edit_plugin_posts',
				'edit_others_posts' => 	'manage_plugin_posts',
				'publish_posts' => 		'publish_plugin_posts',
				'read_private_posts' => 	'read',
				// primitive caps used inside of map_meta_cap()
				'read' => 		'read',
				'delete_posts' => 		'manage_plugin_posts',
				'delete_private_posts' => 	'manage_plugin_posts',
				'delete_published_posts' => 	'manage_plugin_posts',
				'delete_others_posts' => 	'manage_plugin_posts',
				'edit_private_posts' => 	'edit_plugin_posts',
				'edit_published_posts' => 	'edit_plugin_posts'
			),*/
			'labels' => array(
				'name' => 		'My Plugins',
				'singular_name' => 	'Plugin',
				'menu_name' => 		'Plugins',
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


	add_filter('post_type_link', 'plugins_permalink_filter_function', 1, 3);
	function plugins_permalink_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
		if ( strpos('%plugin_category%', $post_link) === 'FALSE' ) {
		  return $post_link;
		}
		$post = get_post($id);
		if ( !is_object($post) || $post->post_type != 'plugin' ) {
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