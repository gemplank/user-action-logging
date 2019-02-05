<?php
/**
 * Activity_Cpt Class.
 *
 * @since   0.1.0
 *
 * @package UAL
 */

namespace UAL;

/**
 * Class Activity_Cpt
 *
 * Register custom post type for activity logging.
 *
 * @since   0.1.0
 *
 * @package UAL
 */
class Activity_Cpt {

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
	 * Run functions.
	 *
	 * @since   0.1.0
	 */
	public function run() {
		add_action( 'init', array( $this, 'ual_action_cpt' ), 10 );
	}

	/**
	 * Register custom post types
	 */
	public function ual_action_cpt() {

		// Unique variable name.
		$activity_labels = array(
			'name'                  => _x( 'Activity', 'Post Type General Name', 'ual' ),
			'singular_name'         => _x( 'Activity', 'Post Type Singular Name', 'ual' ),
			'menu_name'             => __( 'Activity', 'ual' ),
			'name_admin_bar'        => __( 'Activity', 'ual' ),
			'archives'              => __( 'Activity Archives', 'ual' ),
			'attributes'            => __( 'Activity Attributes', 'ual' ),
			'parent_item_colon'     => __( 'Parent Activity:', 'ual' ),
			'all_items'             => __( 'All Activity', 'ual' ),
			'add_new_item'          => __( 'Add New Activity', 'ual' ),
			'add_new'               => __( 'Add New Activity', 'ual' ),
			'new_item'              => __( 'New Activity', 'ual' ),
			'edit_item'             => __( 'Edit Activity', 'ual' ),
			'update_item'           => __( 'Update Activity', 'ual' ),
			'view_item'             => __( 'View Activity', 'ual' ),
			'view_items'            => __( 'View Activity', 'ual' ),
			'search_items'          => __( 'Search Activity', 'ual' ),
			'not_found'             => __( 'Not found', 'ual' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ual' ),
			'featured_image'        => __( 'Featured Image', 'ual' ),
			'set_featured_image'    => __( 'Set featured image', 'ual' ),
			'remove_featured_image' => __( 'Remove featured image', 'ual' ),
			'use_featured_image'    => __( 'Use as featured image', 'ual' ),
			'insert_into_item'      => __( 'Insert into Activity', 'ual' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Activity', 'ual' ),
			'items_list'            => __( 'Activity list', 'ual' ),
			'items_list_navigation' => __( 'Activity list navigation', 'ual' ),
			'filter_items_list'     => __( 'Filter Activity list', 'ual' ),
		);

		// Unique variable name.
		$activity_args = array(
			'label'               => __( 'Activity', 'ual' ),
			'description'         => __( 'Custom Post Type for Activity', 'ual' ),
			'labels'              => $activity_labels,
			'supports'            => array(
				'title',
				'author',
				'editor',
				'revisions',
			),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-networking',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'show_in_rest'        => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => array(
				'with_front' => false,
				'slug'       => _x( 'activity', 'Activity URL', 'ual' ),
			),
		);

		register_post_type( 'activity', $activity_args );

	}
}
