<?php
namespace PHPTest;

class AutoloadTest extends TestCase
{
	/**
	 * @Test
	 */
	public function autoloadPass()
	{
		// Path without "tests" and without "PHPTest";
		$path = dirname(__FILE__);
		$path = str_replace('/tests/', '/', $path);
		$path = dirname($path);

		$testClass = 'PHPTest\Autoload\Stub';
		$before = get_declared_classes();
		// First: Check that the class is not already defined
		$this->assertNotIn($before, $testClass);

		$autoloader = new Autoload($path);

		// Don't use the string in order to ensure that it works with namespaces aswell
		$autoloadedClass = new Autoload\Stub();
		$after = get_declared_classes();
		$this->assertIn($after, $testClass);
	}
}