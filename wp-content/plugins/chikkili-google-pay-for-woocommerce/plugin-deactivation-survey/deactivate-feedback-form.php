<?php

namespace sevengits;

if (!is_admin())
	return;

global $pagenow;

if ($pagenow != "plugins.php")
	return;

if (defined('SGITS_DEACTIVATE_FEEDBACK_FORM_INCLUDED'))
	return;
define('SGITS_DEACTIVATE_FEEDBACK_FORM_INCLUDED', true);

add_action('admin_enqueue_scripts', function () {

	// Enqueue scripts
	if (!wp_script_is('sgits-remodal-js', 'enqueued'))
		wp_enqueue_script('sgits-remodal-js', plugin_dir_url(__FILE__) . 'remodal.min.js');

	if (!wp_style_is('sgits-remodal-css', 'enqueued'))
		wp_enqueue_style('sgits-remodal-css', plugin_dir_url(__FILE__) . 'remodal.css');

	if (!wp_style_is('remodal-default-theme', 'enqueued'))
		wp_enqueue_style('remodal-default-theme', plugin_dir_url(__FILE__) . 'remodal-default-theme.css');

	if (!wp_script_is('sgits-deactivate-feedback-form-js', 'enqueued'))
		wp_enqueue_script('sgits-deactivate-feedback-form-js', plugin_dir_url(__FILE__) . 'deactivate-feedback-form.js');

	if (!wp_script_is('sgits-deactivate-feedback-form-css', 'enqueued'))
		wp_enqueue_style('sgits-deactivate-feedback-form-css', plugin_dir_url(__FILE__) . 'deactivate-feedback-form.css');

	// Localized strings
	wp_localize_script('sgits-deactivate-feedback-form-js', 'sgits_deactivate_feedback_form_strings', array(
		'quick_feedback'			=> __('Quick Feedback', 'chikkili'),
		'foreword'					=> __('If you would be kind enough, please tell us why you\'re deactivating?', 'chikkili'),
		'better_plugins_name'		=> __('Please tell us which plugin?', 'chikkili'),
		'please_tell_us'			=> __('Please tell us the reason so we can improve the plugin', 'chikkili'),
		'do_not_attach_email'		=> __('Do not send my e-mail address with this feedback', 'chikkili'),

		'brief_description'			=> __('Please give us any feedback that could help us improve', 'chikkili'),

		'cancel'					=> __('Cancel', 'chikkili'),
		'skip_and_deactivate'		=> __('Skip &amp; Deactivate', 'chikkili'),
		'submit_and_deactivate'		=> __('Submit &amp; Deactivate', 'chikkili'),
		'please_wait'				=> __('Please wait', 'chikkili'),
		'thank_you'					=> __('Thank you!', 'chikkili')
	));

	// Plugins
	$plugins = apply_filters('sgits_deactivate_feedback_form_plugins', array());

	// Reasons
	$defaultReasons = array(
		'suddenly-stopped-working'	=> __('The plugin suddenly stopped working', 'chikkili'),
		'plugin-broke-site'			=> __('The plugin broke my site', 'chikkili'),
		'no-longer-needed'			=> __('I don\'t need this plugin any more', 'chikkili'),
		'found-better-plugin'		=> __('I found a better plugin', 'chikkili'),
		'temporary-deactivation'	=> __('It\'s a temporary deactivation, I\'m troubleshooting', 'chikkili'),
		'other'						=> __('Other', 'chikkili')
	);

	foreach ($plugins as $plugin) {
		$plugin->reasons = apply_filters('sgits_deactivate_feedback_form_reasons', $defaultReasons, $plugin);
	}

	// Send plugin data
	wp_localize_script('sgits-deactivate-feedback-form-js', 'sgits_deactivate_feedback_form_plugins', $plugins);
});

/**
 * Hook for adding plugins, pass an array of objects in the following format:
 *  'slug'		=> 'plugin-slug'
 *  'version'	=> 'plugin-version'
 * @return array The plugins in the format described above
 */
add_filter('sgits_deactivate_feedback_form_plugins', function ($plugins) {
	return $plugins;
});
