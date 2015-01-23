<?php
class Facebook extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		return $this->_curl( 
					strtolower( $name ), 
					'https://graph.facebook.com' . $arguments[ 0 ], 
					$arguments[ 1 ] 
				);

	}
	
	public function connect( $api_key ){}
	public function put( $path, $options ){}

}