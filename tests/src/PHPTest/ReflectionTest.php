<?php
namespace PHPTest;

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
			'testGetTestMethods'
		);
	}
}