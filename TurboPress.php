<?php declare( strict_types=1 );

/**
 * Plugin Name
 *
 * @package           WordPressPlugin
 * @author            Harkály Gergő
 * @copyright         2025 Harkály Gergő
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       TurboPress
 * Plugin URI:        https://wordpress.org/plugins/turbopress/
 * Description:       Multilingual and multisite compatible WordPress plugin that provides a set of tools and features to enhance the functionality of any website. Make it better, faster and safer. It's free and always will be.
 * Version:           1.0.4
 * Requires at least: 5.2
 * Requires PHP:      8.0
 * Author:            Harkály Gergő
 * Author URI:        https://www.harkalygergo.hu
 * Text Domain:       turbopress
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://wordpress.org/plugins/wp-turbo/
 */

// prevent direct access
if (! defined( 'ABSPATH' ) ) {
    return null;
}

require_once __DIR__ . '/vendor/autoload.php';

(new TurboPress\Controller\TurboPressController())->init();
