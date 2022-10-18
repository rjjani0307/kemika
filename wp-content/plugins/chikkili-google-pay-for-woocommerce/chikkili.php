<?php

/**
 * @link              http://sevengits.com/
 * @since             1.0.0
 * @package           Chikkili
 *
 * @wordpress-plugin
 * Plugin Name:       Chikkili- Google Pay India for Woocommerce
 * Plugin URI:        https://wordpress.org/plugins/chikkili-google-pay-for-woocommerce/
 * Description:       This plugin help shop owners to accept payments through the Google Pay payment gateway.
 * Version:           1.0.2
 * Author:            Sevengits
 * Author URI:        http://sevengits.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chikkili
 * Domain Path:       /languages
 * WC requires at least: 4.0
 * WC tested up to: 	 6.1
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
if (!defined('CHIKKILI_VERSION'))
define('CHIKKILI_VERSION', '1.0.2');

if (!defined('SGC_BASE'))
define('SGC_BASE', plugin_basename( __FILE__ ));

if( ! defined( 'SGC_PLUGIN_PATH' ) ) 
	define( 'SGC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-chikkili-activator.php
 */
function activate_chikkili()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-chikkili-activator.php';
	Chikkili_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-chikkili-deactivator.php
 */
function deactivate_chikkili()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-chikkili-deactivator.php';
	Chikkili_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_chikkili');
register_deactivation_hook(__FILE__, 'deactivate_chikkili');


require SGC_PLUGIN_PATH . 'plugin-deactivation-survey/deactivate-feedback-form.php';
add_filter('sgits_deactivate_feedback_form_plugins', 'sgitsclp_deactivate_feedback');
function sgitsclp_deactivate_feedback($plugins)
{
	$plugins[] = (object)array(
		'slug'		=> 'chikkili-google-pay-india-for-woocommerce',
		'version'	=> CHIKKILI_VERSION
	);
	return $plugins;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-chikkili.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_chikkili()
{

	$plugin = new Chikkili();
	$plugin->run();
}
/**
 * make sure that woocommerce is running 
 */
$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
if (in_array('woocommerce/woocommerce.php', $active_plugins)) {
	run_chikkili();
}
