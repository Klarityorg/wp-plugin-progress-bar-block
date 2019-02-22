<?php
/**
 * Plugin Name: Klarity progress bar block
 * Plugin URI: https://github.com/Klarityorg/wp-plugin-progress-bar
 * Description: Klarity progress bar block
 * Author: Klarity
 * Author URI: https://github.com/Klarityorg
 * Version: 1.0.0
 * License: MIT
 *
 * @package Klarity
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
