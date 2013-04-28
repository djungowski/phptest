<?php
// @TODO: Replace with autolading
require_once 'src/PHPTest/TestCase.php';
require_once 'src/PHPTest/Reflection.php';
require_once 'tests/src/PHPTest/TestCaseTest.php';
require_once 'tests/src/PHPTest/ReflectionTest.php';

$phpTest = new PHPTest\TestCaseTest();
$phpTest->assertTruePass();
$phpTest->assertTrueFail();
$phpTest->assertInstanceOfPass();
$phpTest->assertInstanceOfFail();
//$phpTest->run();

// $phpTest = new PHPTest\ReflectionTest();
// $phpTest->heritage();
// $phpTest->testGetTestMethods();
//$phpTest->run();