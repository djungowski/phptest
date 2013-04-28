<?php
namespace PHPTest;

class Autoload
{
	public function __construct($srcPath)
	{
		$this->addToIncludePath($srcPath);
		spl_autoload_register(array($this, 'load'));
	}

	private function addToIncludePath($path)
	{
		$includePath = get_include_path();
		$includePath .= ':' . $path;
		set_include_path($includePath);
	}

	public function load($className)
	{
		$classFile = str_replace("\\", DIRECTORY_SEPARATOR, $className);
		$classFile .= '.php';
		require_once $classFile;
	}
}