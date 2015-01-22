<?php
class Linkedin extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		return $this->_curl( 
					strtolower( $name ), 
					'http://api.linkedin.com/v1' . $arguments[ 0 ], 
					$arguments[ 1 ] 
				);

	}
	
	public function connect( $api_key ){}
	public function put( $path, $options ){}

}
