<?php

abstract class Abstract_Api {

	protected $debugging = false;

	/*
	 * Method adapted from this answer: http://stackoverflow.com/a/15198925/833696
	 */
	protected function _validate($json, $assoc_array = False) {
		// decode the JSON data
		$result = json_decode($json, $assoc_array);
		// switch and check possible JSON errors
		switch (json_last_error()) {

			case JSON_ERROR_NONE:
				$error = null; // JSON is valid
				break;

			case JSON_ERROR_DEPTH:
				$error = 'Maximum stack depth exceeded.';
				break;

			case JSON_ERROR_STATE_MISMATCH:
				$error = 'Underflow or the modes mismatch.';
				break;

			case JSON_ERROR_CTRL_CHAR:
				$error = 'Unexpected control character found.';
				break;

			case JSON_ERROR_SYNTAX:
				$error = 'Syntax error, malformed JSON.';
				break;

			// only PHP 5.3+
			case JSON_ERROR_UTF8:
				$error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
				break;

			default:
				$error = 'Unknown JSON error occured.';
				break;

		}

		if( !empty( $error ) ) {
			
			throw new JsonException($error);
		
		}
		
		return $result;

	}

        protected function _curl( $method, $path, $options ) {
                if( $this->debugging === true )
                        return $this->_curlTest( $method, $path, $options );

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
                                throw new MethodNotSupportedException( 'Sorry, '.$method.' is an unsupported method.' );
                                break;

                }

                curl_setopt( $curl, CURLOPT_URL, $path );
                curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
                
                return $this->_validate( curl_exec( $curl ) );

        }

	protected function _curlTest( $method, $path, $options ) {
		
		if( is_string( $options ) )
			return $this->_validate( $options );

		return $this->_validate( json_encode( $options ) );

	}

	public function debug() {

		$this->debugging = !$this->debugging;
		return $this->debugging;

	}

}
