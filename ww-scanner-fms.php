<?php
/**
 * @package ww-scanner-fms
 * Plugin Name: WW Scanner FMS
 * Plugin URI: github/repository
 * Description: A simple scanner for your main theme. Looks for suspicious inclusions in theme files. ( base64, eval, shell_exec, etc. )
 * Version: 1.0.1
 * Author: Dmitry Smirnov
 * Author URI: https://github.com/Dmitriy-2014/Dmitriy-2014
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: scannerfms
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2021-2022 Smirnov, Sole proprietorship.
*/

if (!defined('ABSPATH')) {exit;} // Exit if accessed directly.

function menu_panel_scanner_fms() {

add_menu_page('Scanner FMS', 'Scanner FMS', 'manage_options', 'ww-scanner-fms/ww-scanner-fms-dashboard.php', '','dashicons-admin-generic', null);

}

add_action('admin_menu', 'menu_panel_scanner_fms', 20);

// Add styles
function ww_scanner_fms_stylecss(){

wp_register_style( 'ww-scanner-fms-style', plugins_url( 'style.css', __FILE__ ), '', '1.0.1', 'all' );

wp_enqueue_style( 'ww-scanner-fms-style' );

}

add_action( 'admin_enqueue_scripts', 'ww_scanner_fms_stylecss' );
?>