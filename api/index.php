<?php
/**
 * Name: Automatic Theme Plugin Update
 *
 * Original Author: jeremyclark13, Kaspars Dambis (kaspars@konstruktors.com)
 * https://github.com/jeremyclark13/automatic-theme-plugin-update
 */
class Automatic_Theme_Plugin_Update {
	private $packages = array();

	public function __construct() {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		if ( get_magic_quotes_gpc() ) {
			$this->kill_magic_quotes_gpc();
		}

		require_once( 'packages.php' );
		$this->packages = $packages;

		$action = $_POST['action'];
		if ( stristr( $user_agent, 'WordPress' ) == true ) {
			$this->display_response( $action );
		}
	}

	private function kill_magic_quotes_gpc() {
		$process = array( &$_GET, &$_POST, &$_COOKIE, &$_REQUEST );
		while ( list($key, $val) = each( $process ) ) {
			foreach ( $val as $k => $v ) {
				unset( $process[$key][$k] );
				if ( is_array( $v ) ) {
					$process[$key][stripslashes( $k )] = $v;
					$process[] = &$process[$key][stripslashes( $k )];
				} else {
					$process[$key][stripslashes( $k )] = stripslashes( $v );
				}
			}
		}
		unset( $process );
	}

	private function display_response( $action ) {
		$args = unserialize( $_POST['request'] );
		if ( is_array( $args ) ) {
			$args = $this->array_to_object( $args );
		}
		$latest_package = array_shift( $this->packages[$args->slug]['versions'] );

		switch ( $action ) {
			case 'basic_check' :
				$update_info = $this->array_to_object( $latest_package );
				$update_info->slug = $args->slug;

				if ( version_compare( $args->version, $latest_package['version'], '<' ) ) {
					$update_info->new_version = $update_info->version;
					print serialize( $update_info );
				}
				break;
			case 'plugin_information' :
				$data = new stdClass;
				$data->slug = $args->slug;
				$data->version = $latest_package['version'];
				$data->last_updated = $latest_package['date'];
				$data->download_link = $latest_package['package'];
				$data->author = $latest_package['author'];
				$data->external = $latest_package['external'];
				$data->requires = $latest_package['requires'];
				$data->tested = $latest_package['tested'];
				$data->homepage = $latest_package['homepage'];
				$data->downloaded = $latest_package['downloaded'];
				$data->sections = $latest_package['sections'];
				print serialize( $data );
				break;
			case 'theme_update' :
				$update_info = array_to_object( $latest_package );
				$update_data = array( );
				$update_data['package'] = $update_info->package;
				$update_data['new_version'] = $update_info->version;
				$update_data['url'] = $this->packages[$args->slug]['info']['url'];
				if ( version_compare( $args->version, $latest_package['version'], '<' ) ) {
					print serialize( $update_data );
				}
				break;
			case 'theme_information' :
				$data = new stdClass;
				$data->slug = $args->slug;
				$data->name = $latest_package['name'];
				$data->version = $latest_package['version'];
				$data->last_updated = $latest_package['date'];
				$data->download_link = $latest_package['package'];
				$data->author = $latest_package['author'];
				$data->requires = $latest_package['requires'];
				$data->tested = $latest_package['tested'];
				$data->screenshot_url = $latest_package['screenshot_url'];
				print serialize( $data );
				break;
			default :
				echo 'Whoops, this page doesn\'t exist';
		}
	}

	private function array_to_object( $array = array() ) {
		if ( empty( $array ) || !is_array( $array ) )
			return false;

		$data = new stdClass;
		foreach ( $array as $akey => $aval ) {
			$data->{$akey} = $aval;
		}
		return $data;
	}
}
$Automatic_Theme_Plugin_Update = new Automatic_Theme_Plugin_Update();
