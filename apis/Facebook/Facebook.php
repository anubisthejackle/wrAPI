<?php
class Facebook extends Abstract_Api implements Api_Interface {
	
	public function connect( $api_key ){
		// Unused for Facebook
	}

	public function get( $path, $options ){

		return $this->_curl( 'get', $path, $options );

	}

	public function post( $path, $options ){

		return $this->_curl( 'post', $path, $options );

	}

	public function delete( $path, $options ){

		return $this->_curl( 'delete', $path, $options );

	}

	public function put( $path, $options ){
		// Unused for Facebook
	}

	private function _curl( $method, $path, $options ) {

		$curl = curl_init();
		switch( strtolower( $method ) ){
			case 'get':
				$params = '?';
				foreach( $options as $key => $value ){
					$params .= urlencode( $key ) . '=' . urlencode( $value );
				}
				
				if( $params != '?' ){
					$path .= $params;
				}
				break;
			case 'post':
				curl_setopt( $curl, CURLOPT_POST, true );
				curl_setopt( $curl, CURLOPT_POSTFIELDS, $options );
				break;
			case 'delete':
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
				curl_setopt($ch, CURLOPT_POSTFIELDS, $options);
				break;
			default:
				throw new MethodNotSupportedException( 'Sorry, '.$method.' is an unsupported method for Facebook.' );
				break;
		}		

		curl_setopt( $curl, CURLOPT_URL, 'https://graph.facebook.com'.$path );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		
		return $this->_validate( curl_exec( $curl ) );

	}

	/*** INHERITED ***/
	protected function _validate( $json, $assoc_array = False ) {
		return parent::_validate( $json, $assoc_array );
	}

}
