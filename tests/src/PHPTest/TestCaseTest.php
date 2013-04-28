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
		$exception = false;
		try {
			$this->assertTrue(false);
		} catch (\Exception $e) {
			$exception = true;
		}
		$this->assertTrue($exception);
	}

	/**
	 * @Test
	 */
	public function assertEqualsPass()
	{
		$expected = 'foo';
		$actual = 'foo';
		$this->assertEquals($expected, $actual);
	}

	/**
	 * @Test
	 */
	public function assertEqualsFail()
	{
		$expected = 'foo';
		$actual = 'bar';

		$exception = false;
		try {
			$this->assertEquals($expected, $actual);
		} catch(\Exception $e) {
			$exception = true;
		}
		$this->assertTrue($exception);
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
		$exception = false;
		try {
			$this->assertInstanceOf('Foo\Bar', $this);
		} catch (\Exception $e) {
			$exception = true;
		}
		$this->assertTrue($exception);
	}
}