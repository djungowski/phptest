<?php
namespace PHPTest\Assertion;

use PHPTest\TestCase;

class ExceptionTest extends TestCase
{
	/**
	 * @Test
	 */
	public function heritage()
	{
		$actual = new Exception;
		$this->assertInstanceOf('Exception', $actual);
	}
}