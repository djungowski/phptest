<?php
namespace PHPTest;

class Autoload
{
	/**
	 * Register autoloader
	 *
	 * @param String $srcPath 	The path of the PHPTest source files
	 */
	public function __construct($srcPath)
	{
		$this->addToIncludePath($srcPath);
		spl_autoload_register(array($this, 'load'));
	}

	/**
	 *	Add a path to the include path
	 *
	 * @üaram String $path
	 */
	private function addToIncludePath($path)
	{
		$includePath = get_include_path();
		$includePath .= ':' . $path;
		set_include_path($includePath);
	}

	/**
	 * Autoload a specific class
	 *
	 * @param String $className
	 */
	public function load($className)
	{
		$classFile = str_replace("\\", DIRECTORY_SEPARATOR, $className);
		$classFile .= '.php';
		require_once $classFile;
	}
}