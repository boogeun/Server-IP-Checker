<?php
/*
Plugin Name: Server IP Checker
Plugin URI: https://playgroup.kr
Description: WordPress 서버의 IP를 확인합니다.
Author: 놀이터
Author URI: https://playgroup.kr
Version: 1.0
Text Domain: server-ip-checker
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Server_IP_Checker' ) ) {
	class Server_IP_Checker {
		public function __construct() {
			add_action('admin_notices', array( $this, 'admin_ip_notices'));
			add_action('wp_footer', array( $this, 'front_admin_ip_notices'));
		}

		public function admin_ip_notices() {
			if ( current_user_can('administrator') ){
				echo '<div class="updated error"><p>서버 IP는 <strong style="color:#F1574F;">' . $_SERVER['SERVER_ADDR'] . '</strong>입니다.</p></div>';
			}
		}

		public function front_admin_ip_notices() {
			if ( current_user_can('administrator') ){
				echo '<div id="ipAddress" style="position:fixed; right:0; bottom:0; z-index:99999; padding:5px 10px; background:#eee; border-left:3px solid #F1574F; font-size:0.75em;">서버 IP는 <strong style="color:#F1574F;">' . $_SERVER['SERVER_ADDR'] . '</strong>입니다.</div>';
			}
		}
	}

	return new Server_IP_Checker();
}