<?php

require_once( dirname( __FILE__ ) . '/../src/wrAPI.php' );

class TwitterTest extends PHPUnit_Framework_TestCase {

	public function testCreateTwitter() {
		
		$twitter = wrAPI::create( 'Twitter' );
		$this->assertInstanceOf( 'Twitter', $twitter );

	}

	public function testDebugging() {

		$twitter = wrAPI::create( 'Twitter' );
		$debugging = $twitter->debug();
		$this->assertTrue( $debugging );

	}

	public function testGetMethod() {

		$twitter = wrAPI::create( 'Twitter' );
		$twitter->debug();

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

		$result = $twitter->get( '/testPath', $data );

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

		$twitter = wrAPI::create( 'Twitter' );
		$twitter->debug();

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

		$result = $twitter->post( '/testPath', $data );

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

		$twitter = wrAPI::create( 'Twitter' );
		$twitter->debug();

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

		$result = $twitter->delete( '/testPath', $data );

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

		$twitter = wrAPI::create( 'Twitter' );
		$twitter->debug();

		try {

			$data = $twitter->get( '/test', 'FAKE JSON' );
			// SANITY CHECK: This should not run.
			$this->assertTrue( false );

		}catch( Exception $e ){

			$this->assertInstanceOf( 'JsonException', $e );
			$this->assertEquals( 'Syntax error, malformed JSON.', $e->getMessage() );
		}

	}

	public function testJsonMaxDepth() {

		$twitter = wrAPI::create( 'Twitter' );
		$twitter->debug();
		
		$json = null;
		for( $i = 0; $i < 600; $i++ ){

		        $temp = '[' . $json . ']';
		        $json = $temp;

		}

		try {

			$data = $twitter->get('/test', $json);

		}catch( Exception $e ){

			$this->assertInstanceOf( 'JsonException', $e );
			$this->assertEquals( 'Maximum stack depth exceeded.', $e->getMessage() );

		}

	}

}
