<?php

require_once( dirname( __FILE__ ) . '/../src/wrAPI.php' );

class LinkedinTest extends PHPUnit_Framework_TestCase {

	public function testCreateLinkedin() {
		
		$linkedin = wrAPI::create( 'Linkedin' );
		$this->assertInstanceOf( 'Linkedin', $linkedin );

	}

	public function testDebugging() {

		$linkedin = wrAPI::create( 'Linkedin' );
		$debugging = $linkedin->debug();
		$this->assertTrue( $debugging );

	}

	public function testGetMethod() {

		$linkedin = wrAPI::create( 'Linkedin' );
		$linkedin->debug();

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

		$result = $linkedin->get( '/testPath', $data );

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

		$linkedin = wrAPI::create( 'Linkedin' );
		$linkedin->debug();

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

		$result = $linkedin->post( '/testPath', $data );

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

		$linkedin = wrAPI::create( 'Linkedin' );
		$linkedin->debug();

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

		$result = $linkedin->delete( '/testPath', $data );

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

		$linkedin = wrAPI::create( 'Linkedin' );
		$linkedin->debug();

		try {

			$data = $linkedin->get( '/test', 'FAKE JSON' );
			// SANITY CHECK: This should not run.
			$this->assertTrue( false );

		}catch( Exception $e ){

			$this->assertInstanceOf( 'JsonException', $e );
			$this->assertEquals( 'Syntax error, malformed JSON.', $e->getMessage() );
		}

	}

	public function testJsonMaxDepth() {

		$linkedin = wrAPI::create( 'Linkedin' );
		$linkedin->debug();
		
		$json = null;
		for( $i = 0; $i < 600; $i++ ){

		        $temp = '[' . $json . ']';
		        $json = $temp;

		}

		try {

			$data = $linkedin->get('/test', $json);

		}catch( Exception $e ){

			$this->assertInstanceOf( 'JsonException', $e );
			$this->assertEquals( 'Maximum stack depth exceeded.', $e->getMessage() );

		}

	}

}
