<?php
/**
 * Activity_Actions Class.
 *
 * @since   0.1.0
 *
 * @package UAL
 */

namespace UAL;

/**
 * Class Activity_Actions
 *
 * Register 'actions' taxonomy for activity CPT.
 *
 * @since   0.1.0
 *
 * @package UAL
 */
class Activity_Actions {

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
		add_action( 'init', array( $this, 'ual_register_taxonomies' ), 20 );
	}

	/**
	 * Register taxonomies.
	 */
	public function ual_register_taxonomies() {

		$objects = array( 'activity' );

		// Unique variable name.
		$action_labels = array(
			'name'                  => __( 'Actions', 'ual' ),
			'singular_name'         => __( 'Action', 'ual' ),
			'search_items'          => __( 'Search Actions', 'ual' ),
			'popular_items'         => __( 'Popular Actions', 'ual' ),
			'all_items'             => __( 'All Actions', 'ual' ),
			'parent_item'           => __( 'Parent Action', 'ual' ),
			'parent_item_colon'     => __( 'Parent Action', 'ual' ),
			'edit_item'             => __( 'Edit Action', 'ual' ),
			'update_item'           => __( 'Update Action', 'ual' ),
			'add_new_item'          => __( 'Add New Action', 'ual' ),
			'new_item_name'         => __( 'New Action Name', 'ual' ),
			'add_or_remove_items'   => __( 'Add or remove Actions', 'ual' ),
			'choose_from_most_used' => __( 'Choose from most used', 'ual' ),
			'menu_name'             => __( 'Actions', 'ual' ),
		);

		// Unique variable name.
		$action_args = array(
			'labels'            => $action_labels,
			'public'            => true,
			'show_in_nav_menus' => false,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_tagcloud'     => false,
			'show_ui'           => true,
			'query_var'         => true,
			'capabilities'      => array(),
			'rewrite'           => true,
		);

		register_taxonomy( 'actions', $objects, $action_args );

	}
}
