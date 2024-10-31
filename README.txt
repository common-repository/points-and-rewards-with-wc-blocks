=== Points and Rewards with WooCommerce Blocks ===
Contributors: theritesites
Donate link: https://www.theritesites.com
Tags: WooCommerce Blocks, Points and Rewards, WooCommerce, The Rite Sites
Requires at least: 4.0
Requires PHP: 7.0+
Tested up to: 5.6
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Points and Rewards applying of points stopped working with WooCommerce Blocks. Using the shortcode provided in here, you can get full functionality again!

== Description ==
With the release of WooCommerce Blocks, we have noticed a decrease in the plugins that are able to interact with the cart and checkout pages.
We created 4 shortcodes to help with all plugins, but specifically in this case, WooCommerce Points and Rewards!

The first shortcode is in relation to the WooCommerce Cart where Points and Rewards "Apply Points" would typically appear.
Put this above the "WooCommerce Cart" block.
`
[points_and_rewards_above_cart_area]
`

The second shortcode, in relation to WooCommerce Checkout Area.
Put this above the "WooCommerce Checkout" block.
`
[points_and_rewards_above_checkout_area]

// Optional parameter old_coupon defaults to "no" to keep the old
// banner hidden. Use the following shortcode to display the old banner:
[points_and_rewards_above_checkout_area old_coupon="yes" ]
`

The following 2 shortcodes are not typically used by Points and Rewards, but offer a very similar functionality.
Put this below the "WooCommerce Cart" block.
`
[points_and_rewards_below_cart_area]
`

Put this below the "WooCommerce Checkout" block.
`
[points_and_rewards_below_checkout_area]
`

= POWER USERS AND DEVELOPERS =
For a more generalized usage, please see our sister plugin and inspiration for this plugin, [Action Runner](https://wordpress.org/plugins/action-runner/)

== Installation ==

1. Upload `points-and-rewards-with-woocommerce-blocks` to the `/wp-content/plugins/` directory or download the zip directly from the plugin directory.
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 1.2.0 =
* Added in a new option on the above checkout area shortcode to show or hide the old banner of adding coupons. Default is to remove the old banner. To display the banner, use the following shortcode: [points_and_rewards_above_checkout_area old_coupon="yes" ]

= 1.1.1 =
* Fixed bug where shortcode ran in block editor, producing invalid JSON error.
* Tweaked the in-code plugin name to match the given slug from Wordpress

= 1.1.0 =

* Added 2 new shortcodes: [points_and_rewards_below_cart_area] [points_and_rewards_below_checkout_area]

= 1.0.0 =

* Initial release


== Upgrade Notice ==
