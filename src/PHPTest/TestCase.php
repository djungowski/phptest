<?php
namespace PHPTest;

class TestCase
{
	private function assert($expected, $actual)
	{

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
}