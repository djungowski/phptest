<?php
namespace PHPTest\Test;

use PHPTest\Directory;
use PHPTest\TestCase;

class DirectoryTest extends TestCase
{
	/**
	 * @Test
	 */
	public function TestGetFiles()
	{
		$path = dirname(__FILE__);
		$path = $path . DIRECTORY_SEPARATOR . 'Assertion';
		$dir = new Directory($path);
		$actual = $dir->getFiles();

		$expected = array(
			$path . DIRECTORY_SEPARATOR . 'ExceptionTest.php',
			$path . DIRECTORY_SEPARATOR . 'NoAssertionsExceptionTest.php'
		);

		$this->assertEquals($expected, $actual);
	}
}