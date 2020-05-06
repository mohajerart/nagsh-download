<?php
/**
 * @package     NagshDL
 * @author      Mohajer
 * @copyright   2020 Mohajer Art
 * @license     GPL-3.0-or-later
 *
 * Plugin Name:     Nagsh Download
 * Plugin URI:      https://nagsh.ir
 * Description:     Handle the general needs for Nagsh download website
 * Version:         1.0
 * Author:          Mohajer
 * Author URI:      http://mohajerart.ir
 * License:         GPL v3 or later
 * License URI:    https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:    nagsh-dl
 */

/*
Nagsh Download is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Nagsh Download is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Nagsh Download.  If not, see <https://www.gnu.org/licenses/>.
 */

// If the file is called directly abort
defined('ABSPATH') or die( 'You are not doing the right thing!');

// Require once autoload file
if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

// Define CONSTANTS
define('NAGSHDL_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('NAGSHDL_PLUGIN_URL', plugin_dir_url(__FILE__));
define('NAGSHDL_PLUGIN', plugin_basename(__FILE__));

/*
 * The code that runs during plugin activation
 */
function activate_nagsh_download_plugin() {
    NagshDL\Controllers\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_nagsh_download_plugin' );

/*
 * The code that runs during plugin activation
 */
function deactivate_nagsh_download_plugin() {
    NagshDL\Controllers\Deactivate::deactivate();
}
register_activation_hook( __FILE__, 'deactivate_nagsh_download_plugin' );

if ( class_exists( "NagshDL\Init" ) ) {
    NagshDL\Init::register_services();
}