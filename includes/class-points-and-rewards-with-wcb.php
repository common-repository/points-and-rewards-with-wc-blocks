<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * @since      1.0.0
 * @package    TRS\AR
 * @subpackage TRS\AR\includes
 * @author     TheRiteSites <contact@theritesites.com>
 */
final class Points_and_Rewards_WCB {

	/**
	 * Points_and_Rewards_WCB Instance.
	 * 
	 * @access private
	 * @since  1.0
	 * @var	   Points_and_Rewards_WCB The one true Points_and_Rewards_WCB
	 */
	private static $instance;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name = 'points-and-rewards-with-wc-blocks';

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version = '1.2.0';

	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Points_and_Rewards_WCB ) ) {
			self::$instance = new Points_and_Rewards_WCB;

			self::$instance->setup_constants();
			self::$instance->define_hooks();
		}
		return self::$instance;
	}

	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'points-and-rewards-with-woocommerce-blocks' ) );
	}

	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'points-and-rewards-with-woocommerce-blocks' ) );
	}

	private function setup_constants() {

		if ( ! defined( 'PR_WCB_VERSION' ) ) {
			define( 'PR_WCB_VERSION', $this->version );
		}

	}

	public function above_cart_action_runner( $args, $content ) {
		if ( ! is_admin() && ! ( defined( 'DOING_AJAX' ) && ! DOING_AJAX ) && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			do_action( 'woocommerce_before_cart' );
		}
	}

	public function above_checkout_action_runner( $args, $content ) {
		$arg = wp_parse_args( $args, array(
			'old_coupon' => 'no',
		) );
		if ( ! is_admin() && ! ( defined( 'DOING_AJAX' ) && ! DOING_AJAX ) && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			if ( strpos( 'yes', (string) sanitize_text_field( $arg['old_coupon'] ) ) === false ) {
				do_action( 'woocommerce_before_checkout_form' );
			}
		}
	}

	public function below_cart_action_runner( $args, $content ) {
		if ( ! is_admin() && ! ( defined( 'DOING_AJAX' ) && ! DOING_AJAX ) && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			do_action( 'woocommerce_after_cart' );
		}
	}

	public function below_checkout_action_runner( $args, $content ) {
		if ( ! is_admin() && ! ( defined( 'DOING_AJAX' ) && ! DOING_AJAX ) && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
			do_action( 'woocommerce_after_checkout_form' );
		}
	}

	/**
	 * Register all of the hooks related to the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_hooks() {

		add_shortcode( 'points_and_rewards_above_cart_area', array( $this, 'above_cart_action_runner' ) );
		add_shortcode( 'points_and_rewards_above_checkout_area', array( $this, 'above_checkout_action_runner' ) );
		add_shortcode( 'points_and_rewards_below_cart_area', array( $this, 'below_cart_action_runner' ) );
		add_shortcode( 'points_and_rewards_below_checkout_area', array( $this, 'below_checkout_action_runner' ) );

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

}


