<?php
namespace PHPTest;

class TestCase
{
	public function run()
	{
		$reflection = new Reflection($this);
		foreach ($reflection->getTestMethods() as $method) {
			try {
				print '.';
				$this->$method();
			} catch (\InvalidArgumentException $e) {
				print 'F';
				throw $e;
			}
		}
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
			throw new \InvalidArgumentException('Failed asserting that "' . $actual . '" matches "' . $expected . '"');
		}
	}
}