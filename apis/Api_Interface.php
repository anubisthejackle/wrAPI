<?php

abstract class Api_Interface { // Named with an Underscore to disallow it from being called by wrAPI's construct.

	/*
	 * Public Methods
	 */
	abstract public function connect( $api_key );
	abstract public function get( $path, $options );
	abstract public function post( $path, $options );
	abstract public function delete( $path, $options );
	abstract public function put( $path, $options );	
	
	/*
	 * Private Methods
	 */
	protected function _processRequest( $path, $method, $options ){

		// Do stuff
	
	}

}
