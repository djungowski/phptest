<?php
namespace PHPTest;

class TestCase
{
	private $stats = array(
		'run' => 0,
		'pass' => 0,
		'fail' => 0
	);

	public function run()
	{
		$reflection = new Reflection($this);
		foreach ($reflection->getTestMethods() as $method) {
			$this->stats['run']++;
			try {
				print '.';
				$this->$method();
				$this->stats['pass']++;
			} catch (\InvalidArgumentException $e) {
				print 'F';
				$this->stats['fail']++;
				throw $e;
			}
		}
		print PHP_EOL;
		print 'Tests run / passed / fail: ' . $this->stats['run'] . ' / ' . $this->stats['pass'] . ' / ' . $this->stats['fail'] . PHP_EOL;
	}

	public function assertTrue($actual)
	{
		if ($actual !== true) {
			throw new \InvalidArgumentException('Failed asserting that ' . $actual . ' is true');
		}
	}

	public function assertInstanceOf($expected, $actual)
	{
		if (!($actual instanceof $expected)) {
			throw new \InvalidArgumentException('Failed asserting that "' . get_class($actual) . '" is of type "' . $expected . '"');
		}
	}

	public function assertEquals($expected, $actual)
	{
		if ($expected != $actual) {
			throw new \InvalidArgumentException('Failed asserting that "' . $actual . '" equals "' . $expected . '"');
		}
	}

	public function assertNotEquals($value1, $value2)
	{
		if ($value1 == $value2) {
			throw new \InvalidArgumentException('Failed asserting that "' . $value2 . '" does not equal "' . $value1 . '"');
		}
	}

	public function assertIn($haystack, $needle)
	{
		if (!in_array($needle, $haystack)) {
			throw new \InvalidArgumentException('Failed asserting that "' . $needle . '" is in "' . serialize($haystack) . '"');
		}
	}
}