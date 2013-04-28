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

	/**
	 * @Test 
	 */
	public function assertTrueFail()
	{
		try {
			$this->assertTrue(false);
		} catch (\Exception $e) {
			$this->assertTrue($e instanceof \Exception);
		}
	}

	/**
	 * @Test
	 */
	public function assertInstanceOfPass()
	{
		$this->assertInstanceOf('PHPTest\TestCase', $this);
	}

	/**
	 * @Test
	 */
	public function assertInstanceOfFail()
	{
		try {
			$this->assertInstanceOf('Foo\Bar', $this);
		} catch (\Exception $e) {
			$this->assertTrue($e instanceof \Exception);
		}
	}
}