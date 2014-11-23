<?php
class Facebook extends Abstract_Api implements Api_Interface {
	
	public function connect( $api_key ){
		echo 'CONNECTING';
	}

	public function get( $path, $options ){

		$this->_curl( 'get', $path, $options );

	}

	public function post( $path, $options ){

		$this->_curl( 'post', $path, $options );

	}

	public function delete( $path, $options ){

		$this->_curl( 'delete', $path, $options );

	}

	public function put( $path, $options ){
		// Unused for Facebook
	}

	private function _curl( $method, $path, $options ) {

		

	}

	/*** INHERITED ***/
	private function _validate( $json, $assoc_array = False ) {
		return parent::_validate( $json, $assoc_array );
	}

}
