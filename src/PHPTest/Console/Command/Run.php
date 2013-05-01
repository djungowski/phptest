<?php

namespace PHPTest\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Run extends Command
{
    protected function configure()
    {
        $this
            ->setName('run')
            ->setDescription('Run tests')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $asserts = 0;
        $methods = 0;
        $passed = 0;
        $fails = 0;

        $tests = array(
            new \PHPTest\Test\TestCaseTest(),
            new \PHPTest\Test\ReflectionTest(),
            new \PHPTest\Test\Assertion\ExceptionTest(),
            new \PHPTest\Test\DirectoryTest()
        );

        $output->writeln('Running PHPTest');
        $output->writeln('');

        foreach ($tests as $test) {
            $test->run();
            $stats = $test->getStatistics();
            $asserts += $stats['run-asserts'];
            $methods += $stats['run-methods'];
            $passed += $stats['pass'];
            $fails += $stats['fail'];

            $info = sprintf(
                get_class($test) . ' - Tests: %d, Assertions: %d, Passed: %d, Failures: %d',
                $stats['run-methods'],
                $stats['run-asserts'],
                $stats['pass'],
                $stats['fail']
            );

            if ($stats['fail'] > 0) {
                $output->writeln("<error>{$info}</error>");
            } else {
                $output->writeln("<bg=green>{$info}</bg=green>");
            }

            $output->writeln('');
        }

        $output->writeln('');
        $output->writeln('Finished');
        $output->writeln('');

        $output->writeln('Total:');

        $info = sprintf(
            'Tests: %d, Assertions: %d, Passed: %d, Failures: %d',
            $methods,
            $asserts,
            $passed,
            $fails
        );

        if ($fails > 0) {
            $output->writeln("<error>{$info}</error>");
        } else {
            $output->writeln("<bg=green>{$info}</bg=green>");
        }
    }
}