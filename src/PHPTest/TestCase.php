<?php
namespace PHPTest;

class TestCase
{
	private $stats = array(
		'run-methods' => 0,
		'run-asserts' => 0,
		'pass' => 0,
		'fail' => 0
	);

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
					throw new \InvalidArgumentException('Test "' . $method . '" has no assertions');
				}
			} catch (\InvalidArgumentException $e) {
				print 'F';
				$this->stats['fail']++;
				throw $e;
			}
		}
		print PHP_EOL;
		printf(
			'Tests: %d, Assertions: %d, Failures: %d',
			$this->stats['run-methods'],
			$this->stats['run-asserts'],
			$this->stats['pass'],
			$this->stats['fail']
		);
		print PHP_EOL;
	}

	public function assertTrue($actual)
	{
		$this->stats['run-asserts']++;
		if ($actual !== true) {
			throw new \InvalidArgumentException('Failed asserting that ' . $actual . ' is true');
		}
		$this->stats['pass']++;
	}

	public function assertFalse($actual)
	{
		$this->stats['run-asserts']++;
		if ($actual === true) {
			throw new \InvalidArgumentException('Failed asserting that ' . $actual . ' is false');
		}
		$this->stats['pass']++;
	}

	public function assertInstanceOf($expected, $actual)
	{
		$this->stats['run-asserts']++;
		if (!($actual instanceof $expected)) {
			throw new \InvalidArgumentException('Failed asserting that "' . get_class($actual) . '" is of type "' . $expected . '"');
		}
		$this->stats['pass']++;
	}

	public function assertEquals($expected, $actual)
	{
		$this->stats['run-asserts']++;
		if ($expected != $actual) {
			throw new \InvalidArgumentException('Failed asserting that "' . $actual . '" equals "' . $expected . '"');
		}
		$this->stats['pass']++;
	}

	public function assertNotEquals($value1, $value2)
	{
		$this->stats['run-asserts']++;
		if ($value1 == $value2) {
			throw new \InvalidArgumentException('Failed asserting that "' . $value2 . '" does not equal "' . $value1 . '"');
		}
		$this->stats['pass']++;
	}

	public function assertIn($haystack, $needle)
	{
		$this->stats['run-asserts']++;
		if (!in_array($needle, $haystack)) {
			throw new \InvalidArgumentException('Failed asserting that "' . $needle . '" is in "' . serialize($haystack) . '"');
		}
		$this->stats['pass']++;
	}

	public function assertNotIn($haystack, $needle)
	{
		$this->stats['run-asserts']++;
		if (in_array($needle, $haystack)) {
			throw new \InvalidArgumentException('Failed asserting that "' . $needle . '" is not in "' . serialize($haystack) . '"');
		}
		$this->stats['pass']++;
	}
}