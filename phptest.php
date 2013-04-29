#!/usr/bin/php
<?php

require_once 'vendor/autoload.php';

$phpTest = new PHPTest\Test\TestCaseTest();
$phpTest->run();

$phpTest = new PHPTest\Test\ReflectionTest();
$phpTest->run();

$phpTest = new PHPTest\Test\Assertion\ExceptionTest();
$phpTest->run();