<?php
// @TODO: Replace with autolading
require_once 'src/PHPTest/Autoload.php';
require_once 'src/PHPTest/TestCase.php';
require_once 'src/PHPTest/Reflection.php';
require_once 'tests/src/PHPTest/AutoloadTest.php';
require_once 'tests/src/PHPTest/TestCaseTest.php';
require_once 'tests/src/PHPTest/ReflectionTest.php';

$phpTest = new PHPTest\AutoloadTest();
//$phpTest->run();

$phpTest = new PHPTest\TestCaseTest();
$phpTest->run();

$phpTest = new PHPTest\ReflectionTest();
$phpTest->run();