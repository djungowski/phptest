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
		// Use different comparison method in order to ensure that the error is not in assertTrue
		$this->assertEquals($exception, true);
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
	public function assertNotEqualsPass()
	{
		$expected = 'foo';
		$actual = 'bar';
		$this->assertNotEquals($expected, $actual);
	}

	/**
	 * @Test
	 */
	public function assertNotEqualsFail()
	{
		$expected = 'foo';
		$actual = 'foo';
		$exception = false;
		try {
			$this->assertNotEquals($expected, $actual);
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

	/**
	 * @Test
	 */
	public function assertInPass()
	{
		$needle = 'findme';
		$haystack = array(
			'first',
			'second',
			'findme',
			'last'
		);
		$this->assertIn($haystack, $needle);
	}

	/**
	 * @Test
	 */
	public function assertInFail()
	{
		$needle = 'findme1';
		$haystack = array(
			'first',
			'second',
			'findme',
			'last'
		);
		$exception = false;
		try {
			$this->assertIn($haystack, $needle);
		} catch(\Exception $e) {
			$exception = true;
		}
		$this->assertTrue($exception);
	}

	/**
	 * @Test
	 */
	public function assertNotInPass()
	{
		$needle = 'wontbefound';
		$haystack = array(
			'first',
			'second',
			'findme',
			'last'
		);
		$this->assertNotIn($haystack, $needle);
	}

	/**
	 * @Test
	 */
	public function assertNotInFail()
	{
		$needle = 'findme';
		$haystack = array(
			'first',
			'second',
			'findme',
			'last'
		);
		$exception = false;
		try {
			$this->assertNotIn($haystack, $needle);
		} catch(\Exception $e) {
			$exception = true;
		}
		$this->assertTrue($exception);
	}
}