#!/usr/bin/php
<?php

require_once 'vendor/autoload.php';

$console = new Symfony\Component\Console\Application();
$console->add(new \PHPTest\Console\Command\Run());
$console->run();