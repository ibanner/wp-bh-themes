<?php
/**
 * Taxonomies
 *
 * @author		Beit Hatfutsot
 * @package		bh/functions
 * @version		2.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * BH_register_taxonomies
 *
 * This function registers Taxonomies
 *
 * @param	N/A
 * @return	N/A
 */
function BH_register_taxonomies() {

	BH_register_taxonomy_event_category();
	BH_register_taxonomy_occasion();
	BH_register_taxonomy_artist();
	BH_register_taxonomy_badge();

}
add_action( 'init', 'BH_register_taxonomies' );

/**
 * BH_register_taxonomy_event_category
 *
 * This function registers the "event_category" Taxonomy
 *
 * @param	N/A
 * @return	N/A
 */
function BH_register_taxonomy_event_category() {

	$labels = array(
		'name'							=> 'Event Categories',
		'singular_name'					=> 'Event Category',
		'menu_name'						=> 'Event Categories',
		'all_items'						=> 'All Event Categories',
		'edit_item'						=> 'Edit Event Category',
		'view_item'						=> 'View Event Category',
		'update_item'					=> 'Update Event Category',
		'add_new_item'					=> 'Add New Event Category',
		'new_item_name'					=> 'New Event Category Name',
		'parent_item'					=> 'Event Parent Category',
		'parent_item_colon'				=> 'Event Parent Category:',
		'search_items'					=> 'Search Event Categories',
		'popular_items'					=> 'Popular Event Categories',
		'separate_items_with_commas'	=> 'Separate Event Categories with commas',
		'add_or_remove_items'			=> 'Add or remove Event Categories',
		'choose_from_most_used'			=> 'Choose from the most used Event Categories',
		'not_found'						=> 'No Event Categories found'
	);
	
	$args = array(
		'labels'						=> $labels,
		'public'						=> true,
		'show_ui'						=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'show_admin_column'				=> true,
		'hierarchical'					=> true,
		'query_var'						=> true,
		'rewrite'						=> array(
				'slug'					=> 'event_category',
				'with_front'			=> false,
				'hierarchical'			=> false
		)
	);
	register_taxonomy( 'event_category', 'event', $args );

}

/**
 * BH_register_taxonomy_occasion
 *
 * This function registers the "occasion" Taxonomy
 *
 * @param	N/A
 * @return	N/A
 */
function BH_register_taxonomy_occasion() {

	$labels = array(
		'name'							=> 'Occasions',
		'singular_name'					=> 'Occasion',
		'menu_name'						=> 'Occasions',
		'all_items'						=> 'All Occasions',
		'edit_item'						=> 'Edit Occasion',
		'view_item'						=> 'View Occasion',
		'update_item'					=> 'Update Occasion',
		'add_new_item'					=> 'Add New Occasion',
		'new_item_name'					=> 'New Occasion Name',
		'parent_item'					=> 'Parent Occasion',
		'parent_item_colon'				=> 'Parent Occasion:',
		'search_items'					=> 'Search Occasions',
		'popular_items'					=> 'Popular Occasions',
		'separate_items_with_commas'	=> 'Separate Occasions with commas',
		'add_or_remove_items'			=> 'Add or remove Occasions',
		'choose_from_most_used'			=> 'Choose from the most used Occasions',
		'not_found'						=> 'No Occasions found'
	);
	
	$args = array(
		'labels'						=> $labels,
		'public'						=> true,
		'show_ui'						=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'show_admin_column'				=> true,
		'hierarchical'					=> true,
		'query_var'						=> true,
		'rewrite'						=> array(
				'slug'					=> 'shop/occasion',
				'with_front'			=> false
		)
	);
	register_taxonomy( 'occasion', 'product', $args );

}

/**
 * BH_register_taxonomy_artist
 *
 * This function registers the "artist" Taxonomy
 *
 * @param	N/A
 * @return	N/A
 */
function BH_register_taxonomy_artist() {

	$labels = array(
		'name'							=> 'Artists',
		'singular_name'					=> 'Artist',
		'menu_name'						=> 'Artists',
		'all_items'						=> 'All Artists',
		'edit_item'						=> 'Edit Artist',
		'view_item'						=> 'View Artist',
		'update_item'					=> 'Update Artist',
		'add_new_item'					=> 'Add New Artist',
		'new_item_name'					=> 'New Artist Name',
		'parent_item'					=> 'Parent Artist',
		'parent_item_colon'				=> 'Parent Artist:',
		'search_items'					=> 'Search Artists',
		'popular_items'					=> 'Popular Artists',
		'separate_items_with_commas'	=> 'Separate Artists with commas',
		'add_or_remove_items'			=> 'Add or remove Artists',
		'choose_from_most_used'			=> 'Choose from the most used Artists',
		'not_found'						=> 'No Artists found'
	);
	
	$args = array(
		'labels'						=> $labels,
		'public'						=> true,
		'show_ui'						=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'show_admin_column'				=> true,
		'hierarchical'					=> true,
		'query_var'						=> true,
		'rewrite'						=> array(
				'slug'					=> 'shop/artist',
				'with_front'			=> false
		)
	);
	register_taxonomy( 'artist', 'product', $args );

}

/**
 * BH_register_taxonomy_badge
 *
 * This function registers the "badge" Taxonomy
 *
 * @param	N/A
 * @return	N/A
 */
function BH_register_taxonomy_badge() {

	$labels = array(
		'name'							=> 'Badges',
		'singular_name'					=> 'Badge',
		'menu_name'						=> 'Badges',
		'all_items'						=> 'All Badges',
		'edit_item'						=> 'Edit Badge',
		'view_item'						=> 'View Badge',
		'update_item'					=> 'Update Badge',
		'add_new_item'					=> 'Add New Badge',
		'new_item_name'					=> 'New Badge Name',
		'parent_item'					=> 'Parent Badge',
		'parent_item_colon'				=> 'Parent Badge:',
		'search_items'					=> 'Search Badges',
		'popular_items'					=> 'Popular Badges',
		'separate_items_with_commas'	=> 'Separate Badges with commas',
		'add_or_remove_items'			=> 'Add or remove Badges',
		'choose_from_most_used'			=> 'Choose from the most used Badges',
		'not_found'						=> 'No Badges found'
	);
	
	$args = array(
		'labels'						=> $labels,
		'public'						=> true,
		'show_ui'						=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'show_admin_column'				=> true,
		'hierarchical'					=> true,
		'query_var'						=> true,
		'rewrite'						=> array(
				'slug'					=> 'shop/badge',
				'with_front'			=> false
		)
	);
	register_taxonomy( 'badge', 'product', $args );

}

/**
 * Add filter option for admin columns
 */

/**
 * taxonomies_filter_walker class
 *
 * @extends Walker_CategoryDropdown
 */
class taxonomies_filter_walker extends Walker_CategoryDropdown {

	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {

		$pad = str_repeat('&nbsp;', $depth * 3);
		$cat_name = apply_filters('list_cats', $category->name, $category);
		
		if( !isset($args['value']) ) {
			$args['value'] = ( $category->taxonomy != 'category' ? 'slug' : 'id' );
		}
		
		$value = ( $args['value'] == 'slug' ? $category->slug : $category->term_id );
		
		$output .= "\t<option class=\"level-$depth\" value=\"" . $value . "\"";
		if ( $value === (string) $args['selected'] ) {
			$output .= ' selected="selected"';
		}
		$output .= '>';
		$output .= $pad . $cat_name;
		if ( $args['show_count'] )
			$output .= '&nbsp;&nbsp;(' . $category->count . ')';
			
		$output .= "</option>\n";

	}

}

/**
 * BH_taxonomies_filter_list
 *
 * This function adds filter option for the "event" Post Type admin columns
 *
 * @param	N/A
 * @return	N/A
 */
function BH_taxonomies_filter_list() {

	if ( !is_admin() ) return;
	
	$screen = get_current_screen();
	global $wp_query;
	
	if ( $screen->post_type == 'event' ) {

		$taxonomies = array(
			'event_category'	=> 'Event Categories'
		);

	} elseif ( $screen->post_type == 'product' ) {

		$taxonomies = array(
			'occasion'			=> 'Occasions',
			'artist'			=> 'Artists',
			'badge'				=> 'Badges'
		);

	}
	
	if ( $screen->post_type == 'event' || $screen->post_type == 'product' ) {
		foreach ($taxonomies as $slug => $name) {
		
			$args = array(
				'show_option_all'	=> 'Show All ' . $name,
				'taxonomy'			=> $slug,
				'name'				=> $slug,
				'orderby'			=> 'name',
				'selected'			=> ( isset( $wp_query->query[$slug] ) ? $wp_query->query[$slug] : '' ),
				'hierarchical'		=> true,
				'show_count'		=> true,
				'hide_empty'		=> false,
				'walker'			=> new taxonomies_filter_walker(),
				'value'				=> 'slug'
			);
			wp_dropdown_categories($args);
			
		}
	}

}
add_action( 'restrict_manage_posts', 'BH_taxonomies_filter_list' );

/**********************************/
/* transient support action hooks */
/**********************************/

if ( function_exists('BH_create_category') )
	add_action('create_category',		'BH_create_category');
	
if ( function_exists('BH_delete_category') )
	add_action('delete_category',		'BH_delete_category');
	
if ( function_exists('BH_edit_category') )
	add_action('edit_category',			'BH_edit_category');
	
if ( function_exists('BH_create_event_category') )
	add_action('create_event_category',	'BH_create_event_category');
	
if ( function_exists('BH_delete_event_category') )
	add_action('delete_term_taxonomy',	'BH_delete_event_category');
	
if ( function_exists('BH_edit_event_category') )
	add_action('edit_event_category',	'BH_edit_event_category');
	
if ( function_exists('BH_create_event_category') )
	add_action('edited_event_category',	'BH_create_event_category');