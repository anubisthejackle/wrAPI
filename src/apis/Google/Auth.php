<?php
class Google_Auth extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		return $this->_curl( 
					strtolower( $name ), 
					'https://accounts.google.com/o/oauth2' . $arguments[ 0 ], 
					$arguments[ 1 ] 
				);

	}
	
	public function connect( $params ){

		header('Location: https://accounts.google.com/o/oauth2/auth?' . http_build_query( $params ) );

	}

}
