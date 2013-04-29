<?php
namespace PHPTest;

use PHPTest\Assertion;

class TestCase
{
	/**
	 * TestCase statistics
	 * 
	 * @var Array
	 */
	private $stats = array(
		'run-methods' => 0,
		'run-asserts' => 0,
		'pass' => 0,
		'fail' => 0
	);

	/**
	 * Run the whole TestCase and print the statistics afterwards
	 *
	 */
	public function run()
	{
		$reflection = new Reflection($this);
		foreach ($reflection->getTestMethods() as $method) {
			$runBefore = $this->stats['run-asserts'];
			$this->stats['run-methods']++;
			try {
				print '.';
				$this->$method();
				if ($this->stats['run-asserts'] == $runBefore) {
					throw new Assertion\Exception('Test "' . $method . '" has no assertions');
				}
			} catch (Assertion\Exception $e) {
				print 'F';
				$this->stats['fail']++;
				throw $e;
			}
		}
		print PHP_EOL;
		$this->printStatistics();
	}

	/**
	 * Prints the statistics for the TestCase
	 */
	private function printStatistics()
	{
		printf(
			'Tests: %d, Assertions: %d, Failures: %d',
			$this->stats['run-methods'],
			$this->stats['run-asserts'],
			$this->stats['pass'],
			$this->stats['fail']
		);
		print PHP_EOL;
	}

	private function assert($trueCondition, $errorMessage)
	{
		$this->stats['run-asserts']++;
		if (!$trueCondition) {
			$this->stats['fail']++;
			throw new Assertion\Exception($errorMessage);
		}
		$this->stats['pass']++;
	}

	/**
	 * Asserts that $actual is true
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertTrue($actual)
	{
		$trueCondition = ($actual === true);
		$errorMessage = sprintf('Failed asserting that %b is true', $actual);
		$this->assert($trueCondition, $errorMessage);
	}

	/**
	 * Asserts that $actual is false
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertFalse($actual)
	{
		$trueCondition = ($actual === false);
		$errorMessage = sprintf('Failed asserting that %b is true', $actual);
		$this->assert($trueCondition, $errorMessage);
	}

	/**
	 * Asserts that $actual is an instance of $expected
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertInstanceOf($expected, $actual)
	{
		$this->stats['run-asserts']++;
		if (!($actual instanceof $expected)) {
			throw new Assertion\Exception('Failed asserting that "' . get_class($actual) . '" is of type "' . $expected . '"');
		}
		$this->stats['pass']++;
	}

	/**
	 * Asserts that $actual equals $expected
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertEquals($expected, $actual)
	{
		$this->stats['run-asserts']++;
		if ($expected != $actual) {
			throw new Assertion\Exception('Failed asserting that "' . $actual . '" equals "' . $expected . '"');
		}
		$this->stats['pass']++;
	}

	/**
	 * Asserts that $actual does not equal $expected
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertNotEquals($value1, $value2)
	{
		$this->stats['run-asserts']++;
		if ($value1 == $value2) {
			throw new Assertion\Exception('Failed asserting that "' . $value2 . '" does not equal "' . $value1 . '"');
		}
		$this->stats['pass']++;
	}

	/**
	 * Asserts that $needle is in $haystack
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertIn($haystack, $needle)
	{
		$this->stats['run-asserts']++;
		if (!in_array($needle, $haystack)) {
			throw new Assertion\Exception('Failed asserting that "' . $needle . '" is in "' . serialize($haystack) . '"');
		}
		$this->stats['pass']++;
	}

	/**
	 * Asserts that $needle is not in $haystack
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertNotIn($haystack, $needle)
	{
		$this->stats['run-asserts']++;
		if (in_array($needle, $haystack)) {
			throw new Assertion\Exception('Failed asserting that "' . $needle . '" is not in "' . serialize($haystack) . '"');
		}
		$this->stats['pass']++;
	}
}