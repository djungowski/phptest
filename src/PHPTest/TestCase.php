<?php
namespace PHPTest;

class TestCase
{
	public function run()
	{
		$reflection = new Reflection($this);
		foreach ($reflection->getTestMethods() as $method) {
			$this->$method();
		}
	}

	public function assertTrue($actual)
	{
		if ($actual === true) {
			print '.';
		} else {
			print 'F';
			throw new \InvalidArgumentException('Failed asserting that ' . $actual . ' is true');
		}
	}

	public function assertInstanceOf($expected, $actual)
	{
		if ($actual instanceof $expected) {
			print '.';
		} else {
			print 'F';
			throw new \InvalidArgumentException('Failed asserting that "' . get_class($actual) . '" is of type "' . $expected . '"');
		}
	}

	public function assertEquals($expected, $actual)
	{
		if ($expected == $actual) {
			print '.';
		} else {
			print 'F';
			throw new \InvalidArgumentException('Failed asserting that "' . $actual . '" matches "' . $expected . '"');
		}
	}
}