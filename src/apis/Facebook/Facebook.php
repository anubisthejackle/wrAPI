<?php
class Facebook extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		if( strpos( $arguments[ 0 ], '/' ) !== 0 ){
			
			$arguments[ 0 ] = '/'.$arguments[ 0 ];
		
		}

		return $this->_curl( 
					strtolower( $name ), 
					'https://graph.facebook.com/v2.3' . $arguments[ 0 ], 
					$arguments[ 1 ] 
				);

	}
	
	public function connect( $arguments ){}

}
