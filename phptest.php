<?php
// @TODO: Replace with autolading
require_once 'src/PHPTest/Autoload.php';
$path = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src';
$autoload = new PHPTest\Autoload($path);

require_once 'tests/src/PHPTest/AutoloadTest.php';
require_once 'tests/src/PHPTest/TestCaseTest.php';
require_once 'tests/src/PHPTest/ReflectionTest.php';

$phpTest = new PHPTest\AutoloadTest();
$phpTest->run();

$phpTest = new PHPTest\TestCaseTest();
$phpTest->run();

$phpTest = new PHPTest\ReflectionTest();
$phpTest->run();