<?php
// @TODO: Replace with autolading
require_once 'src/PHPTest/TestCase.php';
require_once 'tests/src/PHPTest/TestTestCase.php';

$phpTest = new PHPTest\TestTestCase();
$phpTest->assertTruePass();