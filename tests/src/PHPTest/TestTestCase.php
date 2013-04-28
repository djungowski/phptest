<?php
namespace PHPTest;

class TestTestCase extends TestCase
{
	/**
	 * @Test
	 */
	public function assertTruePass()
	{
		$this->assertTrue(true);
	}
}