<?php
namespace PHPTest\Test\Assertion;

use PHPTest\TestCase;
use PHPTest\Assertion\NoAssertionsException;

class NoAssertionsExceptionTest extends TestCase
{
	/**
	 * @Test
	 */
	public function heritage()
	{
		$exception = new NoAssertionsException();
		$this->assertInstanceOf('\Exception', $exception);
	}
}