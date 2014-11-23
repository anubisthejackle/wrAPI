<?php

require_once( dirname( __FILE__ ).'/apis/Api_Interface.php' );
require_once( dirname( __FILE__ ).'/apis/Abstract_Api.php' );

spl_autoload_register(function( $class ) {

	if( strpos( $class, 'Exception' ) === false )
		return false;

	if( !file_exists( dirname( __FILE__ ).'/exceptions/'.$class.'.php' ) ){

		throw new Exception( 'Error: Custom exception with name '.$class.' not found.' );

	}

	require_once( dirname( __FILE__ ).'/exceptions/'.$class.'.php' );

});

class wrAPI {
	
	/** LOCK OUT INSTANTIATION **/
	private function __construct(){}

	public static function create( $api_name ){

		$api_name = preg_replace( '/[^a-zA-Z0-9]/', null, $api_name );

		if( !file_exists( dirname( __FILE__ ) . '/apis/' . $api_name . '/' . $api_name . '.php' ) ){

			throw new FileNotFoundException("Error: $api_name was not found.");

		}

		require_once( dirname( __FILE__ ) . '/apis/' . $api_name . '/' .$api_name . '.php' );

		return new $api_name();

	}

}

$fb = wrAPI::create('Facebook');
$fb->connect( 'TEST' );
