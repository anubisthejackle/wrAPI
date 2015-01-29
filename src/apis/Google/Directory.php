<?php
class Google_Directory extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		if( !is_string( $arguments[ 1 ] ) )
			$data = json_encode( $arguments[ 1 ] );

		$this->_addCustomHeader( 'Content-Length: ' . strlen( $data ) );

		return $this->_curl( 
					strtolower( $name ), 
					'https://www.googleapis.com/admin/directory/v1' . $arguments[ 0 ], 
					$data
				);

	}
	
	public function connect( $key, $holder ){

		$this->_addCustomHeader( 'Authorization: '.$holder.' '.$key );
		$this->_addCustomHeader( 'Content-Type: application/json' );

	}

}
