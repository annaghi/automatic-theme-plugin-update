<?php
$packages['your-theme-slug'] = array(
	'versions' => array(
		/**
		 * Array name should be set to current version of update
		 */
		'2.0' => array(
			/**
			 * Current version available
			 */
			'version' => '2.0',

			/**
			 * Date version was released
			 */
			'date' => '2010-04-10',

			/**
			 * file_name is the name of the file in the update folder.
			 * theme.zip is the same as file_name
			 */
			'package' => 'http://your-api-server/api/download.php?key=' . md5( 'theme.zip' . mktime( 0, 0, 0, date( 'm' ), date( 'd' ), date( 'Y' ) ) ),

			/**
			 * File name of theme zip file
			 */
			'file_name' => 'theme.zip',

			/**
			 * Author of theme
			 */
			'author' => 'Author Name',

			/**
			 * Name of theme
			 */
			'name' => 'Theme Name',

			/**
			 * Wordpress version required
			 */
			'requires' => '3.1',

			/**
			 * WordPress version tested up to
			 */
			'tested' => '3.8.1',

			/**
			 * url of screenshot of theme
			 */
			'screenshot_url' => 'http://url_to_your_theme_site/screenshot.png',
		),
	),
	'info' => array(
		/**
		 * Website devoted to theme if available
		 */
		'url' => 'http://url_to_your_theme_site',
	),
);

$packages['your-plugin-slug'] = array(
	'versions' => array(
		/**
		 * Array name should be set to current version of update
		 */
		'1.0' => array(
			/**
			 * Current version available
			 */
			'version' => '1.0',

			/**
			 * Plugin Name
			 */
			'name' => 'Plugin Name',

			/**
			 * Date version was released
			 */
			'date' => '2010-04-10',

			/**
			 * Author name - can be linked using html - <a href="http://link-to-site.com">Author Name</a>
			 */
			'author' => 'Author Name',

			/**
			 * WP version required for plugin
			 */
			'requires' => '2.8',

			/**
			 * WP version tested with
			 */
			'tested' => '3.0.1',

			/**
			 * Site devoted to your plugin if available
			 */
			'homepage' => 'http://your_plugin_website',

			/**
			 * Number of times downloaded
			 */
			'downloaded' => '1000',

			/**
			 * Unused
			 */
			'external' => '',

			/**
			 * file_name is the name of the file in the update folder.
			 * plugin.zip is the same as file_name
			 */
			'package' => 'http://your-api-server/api/download.php?key=' . md5( 'plugin.zip' . mktime( 0, 0, 0, date( 'm' ), date( 'd' ), date( 'Y' ) ) ),

			/**
			 * File name of plugin zip file
			 */
			'file_name' => 'plugin.zip',

			/**
			 * Plugin Info sections tabs.
			 * Each key will be used as the title of the tab, value is the contents of tab.
			 * Must be lowercase to function properly
			 * HTML can be used in all sections below for formating.
			 * Must be properly escaped ie a single quote would have to be \'
			 * Screenshot section must use exteranl links for img tags.
			 */
			'sections' => array(
				'description' => '',
				'installation' => '',
				'screen shots' => '',
				'change log' => '',
				'faq' => '',
				'other notes' => '',
			),
		),
	),
	'info' => array(
		/**
		 * Site devoted to your plugin if available
		 */
		'url' => 'http://your_plugin_webiste',
	),
);
