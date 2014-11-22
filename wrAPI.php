<?php
require_once( dirname( __FILE__ ).'/apis/Api_Interface.php' );

spl_autoload_register(function( $class ) {

	if( strpos( $class, 'Exception' ) === false )
		return false;

	require_once( dirname( __FILE__ ).'/exceptions/'.$exception.'.php' );

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
$test = new wrAPI('Twitter');
