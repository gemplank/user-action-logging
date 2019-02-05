<?php
/**
 * Log user actions.
 *
 * @since   0.1.0
 *
 * @package UAL
 */

namespace UAL;

/**
 * Class Action_Log.
 *
 * @since   0.1.0
 *
 * @package UAL
 */
class Action_Log {

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
	 * Run function.
	 *
	 * @since   0.1.0
	 */
	public function run() {
		add_action( 'ual_log_action', array( $this, 'ual_log_activity' ), 10, 3 );
	}

	/**
	 * Function to create an activity post when triggered.
	 *
	 * @param  [int]    $author_id [user ID].
	 * @param  [string] $message   [trigger message].
	 * @param  [string] $tax_slug  [action tax slug].
	 */
	public function ual_log_activity( $author_id, $message, $tax_slug ) {
		if ( ! empty( $author_id ) && ! empty( $message ) && ! empty( $tax_slug ) ) {

			$post_args = array(
				'post_author' => (int) $author_id,
				'post_title'  => esc_html( $message ),
				'post_status' => 'publish',
				'post_type'   => 'activity',
			);

			$post         = wp_insert_post(
				$post_args,
				$wp_error = false
			);

			$new_term = wp_set_object_terms( $post, array( $tax_slug ), 'actions' );

			if ( is_wp_error( $new_term ) ) {
				// @codingStandardsIgnoreLine
				wp_die( $new_term->get_error_message() );
			}
		} else {
			wp_die('author = ' . $author_id);
			return false;
		}
	}
}
