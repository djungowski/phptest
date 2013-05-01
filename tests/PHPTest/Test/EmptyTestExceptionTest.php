<?php
namespace PHPTest\Test;

use PHPTest\TestCase;
use PHPTest\EmptyTestException;

class EmptyTestExceptionTest extends TestCase
{
	/**
	 * @Test
	 */
	public function heritage()
	{
		$exception = new EmptyTestException();
		$this->assertInstanceOf('\Exception', $exception);
	}
}