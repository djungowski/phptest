<?php
namespace PHPTest;

class TestCase
{
	public function run()
	{
		$reflection = new \ReflectionClass($this);
		foreach ($reflection->getMethods() as $method) {
			//var_dump($method->getDocComment());
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
}