<?php
// @TODO: Replace with autolading
require_once 'src/PHPTest/TestCase.php';
require_once 'tests/src/PHPTest/TestCaseTest.php';

$phpTest = new PHPTest\TestCaseTest();
$phpTest->assertTruePass();
$phpTest->assertTrueFails();
$phpTest->assertInArrayPass();