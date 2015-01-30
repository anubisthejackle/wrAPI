<?php
class Twitter extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		return $this->_curl( 
					strtolower( $name ), 
					'https://api.twitter.com/1.1' . $arguments[ 0 ], 
					$arguments[ 1 ] 
				);

	}
	
	public function connect( $params ){}

}
