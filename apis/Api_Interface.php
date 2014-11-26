<?php

interface Api_Interface { // Named with an Underscore to disallow it from being called by wrAPI's construct.

	/*
	 * Public Methods
	 */
	//public function connect( $api_key );
	//public function get( $path, $options );
	//public function post( $path, $options );
	//public function delete( $path, $options );
	//public function put( $path, $options );	
	public function __call( $name, $arguments );
}
