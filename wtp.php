<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.example.com
 * @since             1.0.0
 * @package           Wtp
 *
 * @wordpress-plugin
 * Plugin Name:       WP Test Plugin
 * Plugin URI:        https://www.example.com
 * Description:       This is a test plugin and not for production/live sites.
 * Version:           1.0.0
 * Author:            Alvin Muthui
 * Author URI:        https://www.example.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wtp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WTP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wtp-activator.php
 */
function activate_wtp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wtp-activator.php';
	Wtp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wtp-deactivator.php
 */
function deactivate_wtp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wtp-deactivator.php';
	Wtp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wtp' );
register_deactivation_hook( __FILE__, 'deactivate_wtp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wtp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wtp() {

	$plugin = new Wtp();
	$plugin->run();

}
run_wtp();
