<?php
namespace PHPTest;

class Directory
{
	private $_path;

	public function __construct($path)
	{
		$this->_path = $path;
	}

	public function getFiles()
	{
		$testFiles = array();

		$dirIterator = new \RecursiveDirectoryIterator($this->_path);
		$objects = new \RecursiveIteratorIterator($dirIterator, \RecursiveIteratorIterator::SELF_FIRST);
		foreach($objects as $name => $object){
		    $testFiles[] = $name;
		}
		return $testFiles;
	}
}