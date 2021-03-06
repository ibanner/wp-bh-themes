<?php
/**
 * The Template for displaying shop homepage
 *
 * @author 		Beit Hatfutsot
 * @package 	bh/views/woocommerce/archive
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
	/**
	 * BH_shop_home hook
	 *
	 * @hooked	BH_shop_home_banners - 10
	 * @hooked	BH_shop_home_categories_menu - 20
	 * @hooked	BH_shop_home_featured - 30
	 * @hooked	BH_shop_home_product_sliders - 40
	 */
	do_action('BH_shop_home');
?>