<?php

namespace PHPTest\Test;

use PHPTest\TestCase;
use PHPTest\Reflection;

class ReflectionTest extends TestCase
{
	/**
	 * @Test
	 */
	public function heritage()
	{
		$actual = new Reflection($this);
		$this->assertInstanceOf('\ReflectionClass', $actual);
	}

	/**
	 * @Test
	 */
	public function testGetTestMethods()
	{
		$expected = array(
			'heritage',
			'testGetTestMethods'
		);
		$reflection = new Reflection($this);
		$actual = $reflection->getTestMethods();
		$this->assertEquals($expected, $actual);
	}
}