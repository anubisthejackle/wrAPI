<?php

abstract class Abstract_Api {

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

}
