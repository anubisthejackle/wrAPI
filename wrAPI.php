<?php
require_once( dirname( __FILE__ ).'/apis/Api_Interface.php' );

class wrAPI {
	
	public function __construct( $api_name, $options = array() ){

		if( file_exists( dirname( __FILE__ ) . '/apis/' . $this->_filterFile( $api_name ) ) ){

			

		}

	}

	private function _filterFile( $filename ) {

		return preg_replace( '/[^a-zA-Z0-9]/', null, $filename );

	}

}

