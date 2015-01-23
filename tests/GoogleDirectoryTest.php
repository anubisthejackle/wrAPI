<?php

require_once( dirname( __FILE__ ) . '/../src/wrAPI.php' );

class Google_DirectoryTest extends PHPUnit_Framework_TestCase {

	public function testCreateGoogle_Directory() {
		
		$fb = wrAPI::create( 'Google_Directory' );
		$this->assertInstanceOf( 'Google_Directory', $fb );

	}

	public function testDebugging() {

		$fb = wrAPI::create( 'Google_Directory' );
		$debugging = $fb->debug();
		$this->assertTrue( $debugging );

	}

	public function testGetMethod() {

		$fb = wrAPI::create( 'Google_Directory' );
		$fb->debug();

		$object = new stdClass();

		$data = array(
			'int' => 123,
			'string' => 'test',
			'boolTrue' => true,
			'boolFalse' => false,
			'null' => null,
			'array' => array( 1,2,3 ),
			'object' => $object
		);

		$result = $fb->get( '/testPath', $data );

		$this->assertTrue( is_object( $result ) );

		$this->assertEquals( 123, $result->int );
		$this->assertEquals( 'test', $result->string );
		$this->assertTrue( $result->boolTrue );
		$this->assertFalse( $result->boolFalse );
		$this->assertNull( $result->null );
		$this->assertTrue( is_array( $result->array ) );
		$this->assertNotEmpty( $result->array );
		$this->assertTrue( is_object( $result->object ) );

	}
	
	public function testPostMethod() {

		$fb = wrAPI::create( 'Google_Directory' );
		$fb->debug();

		$object = new stdClass();

		$data = array(
			'int' => 123,
			'string' => 'test',
			'boolTrue' => true,
			'boolFalse' => false,
			'null' => null,
			'array' => array( 1,2,3 ),
			'object' => $object
		);

		$result = $fb->post( '/testPath', $data );

		$this->assertTrue( is_object( $result ) );

		$this->assertEquals( 123, $result->int );
		$this->assertEquals( 'test', $result->string );
		$this->assertTrue( $result->boolTrue );
		$this->assertFalse( $result->boolFalse );
		$this->assertNull( $result->null );
		$this->assertTrue( is_array( $result->array ) );
		$this->assertNotEmpty( $result->array );
		$this->assertTrue( is_object( $result->object ) );

	}
	
	public function testDeleteMethod() {

		$fb = wrAPI::create( 'Google_Directory' );
		$fb->debug();

		$object = new stdClass();

		$data = array(
			'int' => 123,
			'string' => 'test',
			'boolTrue' => true,
			'boolFalse' => false,
			'null' => null,
			'array' => array( 1,2,3 ),
			'object' => $object
		);

		$result = $fb->delete( '/testPath', $data );

		$this->assertTrue( is_object( $result ) );

		$this->assertEquals( 123, $result->int );
		$this->assertEquals( 'test', $result->string );
		$this->assertTrue( $result->boolTrue );
		$this->assertFalse( $result->boolFalse );
		$this->assertNull( $result->null );
		$this->assertTrue( is_array( $result->array ) );
		$this->assertNotEmpty( $result->array );
		$this->assertTrue( is_object( $result->object ) );

	}

	public function testMalformedJSON() {

		$fb = wrAPI::create( 'Google_Directory' );
		$fb->debug();

		try {

			$data = $fb->get( '/test', 'FAKE JSON' );
			// SANITY CHECK: This should not run.
			$this->assertTrue( false );

		}catch( Exception $e ){

			$this->assertInstanceOf( 'JsonException', $e );
			$this->assertEquals( 'Syntax error, malformed JSON.', $e->getMessage() );
		}

	}

	public function testJsonMaxDepth() {

		$fb = wrAPI::create( 'Google_Directory' );
		$fb->debug();
		
		$json = null;
		for( $i = 0; $i < 600; $i++ ){

		        $temp = '[' . $json . ']';
		        $json = $temp;

		}

		try {

			$data = $fb->get('/test', $json);

		}catch( Exception $e ){

			$this->assertInstanceOf( 'JsonException', $e );
			$this->assertEquals( 'Maximum stack depth exceeded.', $e->getMessage() );

		}

	}

}
