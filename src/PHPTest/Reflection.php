<?php
namespace PHPTest;

class Reflection extends \ReflectionClass
{
	/**
	 * Get all test methods for a TestCase
	 *
	 * @return Array
	 */
	public function getTestMethods()
	{
		$methods = array();
		foreach ($this->getMethods() as $method) {
			if ($this->isTestMethod($method)) {
				$methods[] = $method->name;
			}
		}
		return $methods;
	}

	/**
	 * Tell if a given method is a test
	 * A method is a test if @Test is in the docblock comments
	 *
	 * @return Boolean
	 */
	private function isTestMethod(\ReflectionMethod $method)
	{
		$docComment = $method->getDocComment();
		if ($docComment !== false) {
			// Check that doc Comment has @Test in it
			return preg_match('#@Test#', $docComment);
		}
		return false;
	}
}