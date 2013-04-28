<?php
namespace PHPTest;

class TestCaseTest extends TestCase
{
	/**
	 * @Test
	 */
	public function assertTruePass()
	{
		$this->assertTrue(true);
	}

	public function assertTrueFails()
	{
		try {
			$this->assertTrue(false);
		} catch (\Exception $e) {
			$this->assertTrue($e instanceof \Exception);
		}
	}
}