<?php
/**
 * API - event page template content
 *
 * @author 		Beit Hatfutsot
 * @package 	bh/api
 * @version     2.7.0
 */

define( 'DOING_AJAX', true );
define( 'WP_ADMIN', false );
header( 'Cache-Control: no-cache, must-revalidate' );

require_once( '../../../../wp-load.php' );

/**
 * Variables
 */
global $globals;

$globals[ 'events' ] = array();
$globals[ 'sticky_events_ids' ] = array();

$category	= ( isset( $_POST[ 'event_category' ] ) && $_POST[ 'event_category' ] ) ? $_POST[ 'event_category' ] : '';	// category term_id
$date		= ( isset( $_POST[ 'event_date' ] ) && $_POST[ 'event_date' ] ) ? $_POST[ 'event_date' ] : '';				// start date in 'd/m/Y' format
$lang		= ( isset( $_POST[ 'lang' ] ) && $_POST[ 'lang' ] ) ? $_POST[ 'lang' ] : '';								// en/he

if ( $lang ) {

	global $sitepress;

	// Changes language
	$sitepress->switch_lang( $lang );

	add_filter( 'acf/settings/current_language', function() {
		global $lang;
		return $lang;
	});

}

if ( $date ) {

	$date = date_create_from_format( 'd/m/Y', $date );
	$date = $date->format( 'Ymd' );

}

if ( function_exists( 'get_field' ) ) {

	// Get sticky events
	$sticky_events = get_field( 'acf-options_exhibitions_and_events_sticky_events', 'option' );

	/**
	 * Check if $category is defined as all exhibitions/events
	 * If it is, do the following steps:
	 * 1. Get categories type should be displayed (exhibition / event)
	 * 2. Get all categories belong to this particular type
	 */
	if ( in_array( $category, array( 'exhibition', 'event' ) ) ) {

		// Get all categories belong to this particular type
		$include_categories = get_terms( array(
			'taxonomy'		=> 'event_category',
			'fields'		=> 'ids',
			'meta_query'	=> array(
				array(
					'key'		=> 'acf-event_category_type',
					'value'		=> $category,
					'compare'	=> '='
				)
			)
		) );

	}

}

if ( $sticky_events ) {

	/**
	 * Exclude sticky events not belong to
	 * none of included categories or to
	 * filtered category
	 */
	if ( $category || isset( $include_categories ) ) {
		foreach ( $sticky_events as $key => $s ) {
			$event_categories = wp_get_post_terms( $s[ 'event' ]->ID, 'event_category', array( 'fields' => 'ids' ) );

			if ( isset( $include_categories ) ) {
				if ( count( array_intersect( $include_categories, $event_categories ) ) === 0 )
					unset( $sticky_events[ $key ] );
			}
			else {
				if ( ! in_array( $category, $event_categories ) )
					unset( $sticky_events[ $key ] );
			}
		}
	}

	// Initiate $globals[ 'sticky_events_ids' ]
	// Initiate $globals[ 'events' ] with $sticky_events if exists any
	if ( $sticky_events ) {
		foreach ( $sticky_events as $s ) {
			$globals[ 'sticky_events_ids' ][] = $s[ 'event' ]->ID;
			$globals[ 'events' ][] = $s[ 'event' ];
		}
	}

}

// Get future events
$args = array(
	'post_type'			=> 'event',
	'posts_per_page'	=> -1,
	'no_found_rows'		=> true,
	'meta_key'			=> 'acf-event_end_date',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC',
	'meta_query'		=> array(
		array(
			'key'		=> 'acf-event_end_date',
			'value'		=> ( $date ) ? $date : date_i18n( 'Ymd' ),
			'type'		=> 'DATE',
			'compare'	=> '>='
		)
	)
);

if ( $category || isset( $include_categories ) ) {

	$args[ 'suppress_filters' ]	= true;
	$args['tax_query']			= array(
		array(
			'taxonomy'	=> 'event_category',
			'field'		=> 'term_id',
			'terms'		=> $include_categories ? $include_categories : (int)$category
		)
	);

}

if ( $globals[ 'sticky_events_ids' ] ) {
	$args[ 'post__not_in' ] = $globals[ 'sticky_events_ids' ];
}

$events_query = new WP_Query( $args );

if ( $events_query->have_posts() ) : while ( $events_query->have_posts() ) : $events_query->the_post();
	$globals[ 'events' ][] = $post;
endwhile; endif; wp_reset_postdata();

/**
 * Build event elements
 */
get_template_part( 'views/event/set-event-elements' );

/**
 * Display events list
 */
if ( $globals[ 'events' ] ) {
	get_template_part( 'views/event/events', 'list' );
}
else {
	get_template_part( 'views/components/not-found' );
}