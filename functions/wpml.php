<?php
/**
 * WPML functions
 *
 * @author		Beit Hatfutsot
 * @package		bh/functions
 * @version		2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Variables
 */
global $globals;

$globals[ 'wpml_lang' ] = function_exists( 'icl_object_id' ) ? ICL_LANGUAGE_CODE : '';

/**
 * Load theme text domain
 */
load_theme_textdomain( 'BH', get_template_directory() . '/languages' );

/**
 * WPML - disable scripts & styles
 */
define( 'ICL_DONT_LOAD_NAVIGATION_CSS',			true );
define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS',	true );
define( 'ICL_DONT_LOAD_LANGUAGES_JS',			true );

/**
 * BH_footer_menu_languages_list
 *
 * This function generates the languages list items for the footer menu
 *
 * @param	N/A
 * @return	(string)
 */
function BH_footer_menu_languages_list() {

	if ( ! function_exists( 'icl_get_languages' ) )
		return;

	$languages	= icl_get_languages( 'skip_missing=0&orderby=custom' );
	$output		= '';
	
	if ( ! empty( $languages ) ) {

		foreach ( $languages as $l ) {

			if ( ( is_woocommerce() || $globals[ 'shop_page' ] ) && $l[ 'language_code' ] == 'ru' )
				continue;

			$output .= '<li><a ' . ( ! $l[ 'active' ] ? 'href="' . $l[ 'url' ] . '"' : 'style="cursor: default;"' ) . '><span>' . $l[ 'native_name' ] . '</span></a></li>';

		}

	}

	// return
	return $output;

}