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
	
	public function __construct( $api_name, $options = array() ){

		if( !file_exists( dirname( __FILE__ ) . '/apis/' . $this->_filterFile( $api_name ) ) ){

			throw new FileNotFoundException("Error: $api_name was not found.");				

		}

	}

	private function _filterFile( $filename ) {

		return preg_replace( '/[^a-zA-Z0-9]/', null, $filename );

	}

}

