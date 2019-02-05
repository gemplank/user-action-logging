<?php
/**
 * Helpers Class.
 *
 * @since   0.1.0
 *
 * @package UAL
 */

namespace UAL;

/**
 * Class Helpers
 *
 * Helpers to trigger activity function.
 *
 * @since   0.1.0
 *
 * @package UAL
 */
class Helpers {

	/**
	 * Path to the root plugin file.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_root;

	/**
	 * Plugin name.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_name;

	/**
	 * Plugin slug.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_slug;

	/**
	 * Plugin prefix.
	 *
	 * @var     string
	 * @access  private
	 * @since   0.1.0
	 */
	private $plugin_prefix;

	/**
	 * Constructor.
	 *
	 * @since   0.1.0
	 */
	public function __construct() {
		$this->plugin_root   = UAL_ROOT;
		$this->plugin_name   = UAL_NAME;
		$this->plugin_slug   = UAL_SLUG;
		$this->plugin_prefix = UAL_PREFIX;
	}

	/**
	 * Unleash Hell.
	 *
	 * @since   0.1.0
	 */
	public function run() {
		add_action( 'wp_login', array( $this, 'ual_activity_login' ), 10 );
		add_action( 'wp_logout', array( $this, 'ual_activity_logout' ), 10 );
	}

	/**
	 * Helper to log activity when user logs in.
	 */
	public function ual_activity_login() {

		// Prevent user ID returning as 0.
		$user_reset = apply_filters( 'determine_current_user', false );

		wp_set_current_user( $user_reset );

		// Store user id.
		$user_id = get_current_user_id();

		// If we have the user id, continue.
		if ( ! empty( $user_id ) ) {
			// Get user data with id.
			$user = get_userdata( $user_id );

			// Store a user name.
			$user_name = $user->display_name ? $user->display_name : $user->user_nicename;

			// Log this activity.
			do_action( 'ual_log_action', $user->ID, $user_name . ' logged In', 'logged-in' );
		}
	}

	/**
	 * Helper to log activity when user logs out.
	 */
	public function ual_activity_logout() {

		// Store user id.
		$user_id = get_current_user_id();

		// If we have the user id, continue.
		if ( ! empty( $user_id ) ) {
			// Get user data with id.
			$user = get_userdata( $user_id );

			// Store a user name.
			$user_name = $user->display_name ? $user->display_name : $user->user_nicename;

			// Log this activity.
			do_action( 'ual_log_action', $user->ID, $user_name . ' logged out', 'logged-out' );
		}
	}
}
