<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.wplauncher.com
 * @since             1.0.0
 * @package           Tweet_Button
 *
 * @wordpress-plugin
 * Plugin Name:       The Tweet Button
 * Plugin URI:        https://www.wplauncher.com
 * Description:       Simple way to add a Tweet Button to a post or page
 * Version:           1.0.0
 * Author:            Ben Shadle
 * Author URI:        https://www.wplauncher.com/team
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       the-tweet-button
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tweet-button-activator.php
 */
function activate_tweet_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tweet-button-activator.php';
	Tweet_Button_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tweet-button-deactivator.php
 */
function deactivate_tweet_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tweet-button-deactivator.php';
	Tweet_Button_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tweet_button' );
register_deactivation_hook( __FILE__, 'deactivate_tweet_button' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tweet-button.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tweet_button() {

	$plugin = new Tweet_Button();
	$plugin->run();

}
run_tweet_button();
