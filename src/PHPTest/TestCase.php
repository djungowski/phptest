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
				$this->$method();
				if ($this->stats['run-asserts'] == $runBefore) {
					$errorMessage = sprintf('Test %s::%s has no assertions', get_class($this), $method);
					throw new Assertion\NoAssertionsException($errorMessage);
				}
			} catch (Assertion\Exception $e) {
				$this->stats['fail']++;
				throw $e;
			}
		}
		// Throw exception if class has no test methods
		if ($this->stats['run-methods'] == 0) {
			$errorMessage = sprintf('TestCase "%s" has no tests', get_class($this));
			throw new EmptyTestException($errorMessage);
		}
	}

    /**
     * Returns the statistics for the TestCase
     *
     * @return array
     */
    public function getStatistics()
    {
        return $this->stats;
    }

    /**
     * Get the calling method for a failed test
     *
     * @return String
     */
	private function getCallingTestMethod()
	{
		$trace = debug_backtrace();
		// 0: current function/method
		// 1: TestCase::assert()
		// 2: TestCase::assert<Method>()
		// 3: Original Testmethod
		$callerTrace = $trace[3];
		$assertionTrace = $trace[2];
		$callingMethod = array(
			'name' => '',
			'assertion' => 0
		);
		if (isset($callerTrace['class'])) {
			$callingMethod['name'] .= $callerTrace['class'] . '::';
		}
		$callingMethod['name'] .= $callerTrace['function'];
		$callingMethod['assertion'] = $assertionTrace['function'];
		return $callingMethod;
	}

	/**
	 * Run an assertion and fail if it's broken
	 *
	 * @throws Assertion\Exception
	 */
	private function assert($condition, $errorMessage)
	{
		$this->stats['run-asserts']++;
		$assertion = assert($condition);
		if ($assertion != true) {
			$callingMethod = $this->getCallingTestMethod();
			$errorMessage = sprintf(
				'Error in Testmethod %s' . PHP_EOL .
				'Used Assertion: "%s"' . PHP_EOL .
				'%s',
				$callingMethod['name'],
				$callingMethod['assertion'],
				$errorMessage
			);
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
		$condition = ($actual === true);
		$errorMessage = sprintf('Failed asserting that %b is true', $actual);
		$this->assert($condition, $errorMessage);
	}

	/**
	 * Asserts that $actual is false
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertFalse($actual)
	{
		$condition = ($actual === false);
		$errorMessage = sprintf('Failed asserting that %b is true', $actual);
		$this->assert($condition, $errorMessage);
	}

	/**
	 * Asserts that $actual is an instance of $expected
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertInstanceOf($expected, $actual)
	{
		$condition = ($actual instanceof $expected);
		$errorMessage = sprintf('Failed asserting that "%s" is of type "%s"', get_class($actual), $expected);
		$this->assert($condition, $errorMessage);
	}

	/**
	 * Asserts that $actual equals $expected
	 *
	 * @throws InvalidArgumentException
	 */
	public function assertEquals($expected, $actual)
	{
		$condition = ($expected == $actual);
		$errorMessage = sprintf('Failed asserting that "%s" equals "%s"', $actual, $expected);
		$this->assert($condition, $errorMessage);
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