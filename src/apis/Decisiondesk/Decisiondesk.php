<?php
class Decisiondesk extends Abstract_Api implements Api_Interface {
	
	public function __call( $name, $arguments ) {

		$data = isset($arguments[1]) ? $arguments[1] : null;

		return $this->_curl(
					strtolower( $name ),
					'https://prodapi.decisiondeskhq.com' . $arguments[ 0 ],
					$data
				);

	}
	
	public function connect( $params ){

		$this->_addCustomHeader( 'Authorization: '.$params['token_type'].' '.$params['access_token'] );
		$this->_addCustomHeader( 'Content-Type: application/json' );

	}

}
