<?php
/**
 * @link              https://www.theritesites.com
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Points and Rewards with WC Blocks
 * Plugin URI:        https://www.theritesites.com/plugins/action-runner
 * Description:       Points and Rewards applying of points stopped working with WooCommerce Blocks. Using the shortcode provided in here, you can get full functionality again!
 * Version:           1.2.0
 * Author:            TheRiteSites
 * Author URI:        https://www.theritesites.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-points-and-rewards-with-wcb.php';

/**
 * Add action links like settings and documentation
 * 
 * @since 1.3.0
 * @param $links array	Passed in links from WordPress plugin list
 */
function pnr_wcb_add_action_links( $links ) {
	$new_links = array(
	'<a href="https://www.theritesites.com/docs/category/action-runner/">Docs</a>',
	'<a href="https://www.theritesites.com/plugin-support/">Support</a>',
	);
	return array_merge($new_links, $links);
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'pnr_wcb_add_action_links' );


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function points_and_rewards_with_wc_blocks() {

	return Points_and_Rewards_WCB::instance();

}
points_and_rewards_with_wc_blocks();
