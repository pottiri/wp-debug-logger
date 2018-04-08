<?php
/*
Plugin Name: Wp debug log plus
Plugin URI:
Description: It is a plug-in which outputs start log, end log, SQL log and error log to WordPress's debug.log.
Version: 0.0.1
Author: Satoshi Kaneyasu
Author URI: https://blog.pottiri.tech
*/

define('WPDLP_MAIN_FILE', __FILE__);
define('WPDLP_PLUGIN_DIR', dirname(__FILE__));
require_once( dirname( __FILE__ ) . '/includes/class-wp-debug-log-plus-options.php' );
require_once( dirname( __FILE__ ) . '/includes/class-wp-debug-log-plus-admin.php' );
require_once( dirname( __FILE__ ) . '/includes/class-wp-debug-log-plus-logger.php' );
Wp_Debug_Log_Plus_Options::get_object();
Wp_Debug_Log_Plus_Admin::get_object();
Wp_Debug_Log_Plus_Logger::get_object();

if ( !function_exists( 'wpdlp_log' ) ) {
	/**
	 * Log output
	 *
	 * @since  0.0.1
	 * @access public
	 * @param  string $message String to log.
	 * @return void
	 */
	function wpdlp_log( $message ) {
		Wp_Debug_Log_Plus_Logger::get_object()->log( $message );
	}
}
