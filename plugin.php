<?php
/**
 * User Action Logging
 *
 * @package           UAL
 *
 * Plugin Name:       User Action Logging
 * Description:       Log user actions within a custom post type.
 * Version:           0.1
 * Author:            Gemma Plank <info@gpwebdevelopment.co.uk>
 * Author URI:        https://gpwebdevelopment.co.uk
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       ual
 * Domain Path:       /languages
 */

/**
 * Abort on Direct Call
 *
 * Abort if this file is called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Constants.
 */
define( 'UAL_ROOT', __FILE__ );
define( 'UAL_NAME', 'User Action Logging' );
define( 'UAL_SLUG', 'user-action-logging' );
define( 'UAL_PREFIX', 'ual_' );
define( 'UAL_MIN_PHP_VERSION', '5.6' );

/**
 * Classes.
 */
require_once 'php/class-activity-cpt.php';
require_once 'php/class-activity-actions.php';
require_once 'php/class-activity-logging.php';
require_once 'php/class-activity-helpers.php';

/**
 * Namespaces.
 */
use UAL\Activity_Cpt;
use UAL\Activity_Actions;
use UAL\Action_Log;
use UAL\Helpers;

/**
 * Instances.
 */
$activity_cpt     = new Activity_Cpt();
$activity_actions = new Activity_Actions();
$action_log       = new Action_Log();
$helpers          = new Helpers();

/**
 * Run!
 */
$activity_cpt->run();
$activity_actions->run();
$action_log->run();
$helpers->run();
