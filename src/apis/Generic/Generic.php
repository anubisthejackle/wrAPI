<?php

class Generic extends Abstract_Api implements Api_Interface
{

    public function __call( $name, $arguments ) {

		$data = isset($arguments[1]) ? $arguments[1] : null;

		return $this->_curl(
					strtolower( $name ),
					$arguments[ 0 ],
					$data
				);

	}
	
	public function connect($arguments) {}

	public function addCustomHeader( $customHeader ){

		$this->_addCustomHeader( $customHeader );

    }
    
}
