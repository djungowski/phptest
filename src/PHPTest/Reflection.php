<?php
namespace PHPTest;

class Reflection extends \ReflectionClass
{
	public function getTestMethods()
	{
		$methods = array();
		foreach ($this->getMethods() as $method) {
			$docComment = $method->getDocComment();
			if ($docComment !== false) {
				// Check that doc Comment has @Test in it
				if (preg_match('/\@Test/', $docComment)) {
					$methods[] = $method->name;
				}
			}
		}
		return $methods;
	}	
}