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