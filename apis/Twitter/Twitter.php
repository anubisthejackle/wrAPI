<?php
class Twitter extends Abstract_Api implements Api_Interface {
	
	public function get( $path, $options ){

		return $this->_curl( 'get', $path, $options );

	}

	public function post( $path, $options ){

		return $this->_curl( 'post', $path, $options );

	}

	public function delete( $path, $options ){

		return $this->_curl( 'delete', $path, $options );

	}

	protected function _curl( $method, $path, $options ) {
		return parent::_curl( $method, 'https://api.twitter.com/1.1'.$path, $options );
	}

	/*
	 * Unused
	 */
	public function connect( $api_key ){}
	public function put( $path, $options ){}
}
