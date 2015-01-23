<?php
class Google_Directory extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		return $this->_curl( 
					strtolower( $name ), 
					'https://www.googleapis.com/admin/directory/v1' . $arguments[ 0 ], 
					$arguments[ 1 ] 
				);

	}
	
	public function connect( $api_key ){}
	public function put( $path, $options ){}

}
