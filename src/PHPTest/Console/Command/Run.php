<?php

namespace PHPTest\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use PHPTest\TestCase;

class Run extends Command
{
    private $_stats = array(
        'asserts'   => 0,
        'methods'   => 0,
        'passed'    => 0,
        'fails'     => 0
    );

    protected function configure()
    {
        $this
            ->setName('run')
            ->setDescription('Run tests')
        ;
        $this->setAssertionOptions();
    }

    /**
     * Sets the options for the assert() function
     * which is used for running the assertions
     */
    private function setAssertionOptions()
    {
        assert_options(ASSERT_ACTIVE, 1);
        assert_options(ASSERT_WARNING, 0);
        assert_options(ASSERT_QUIET_EVAL, 1);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tests = array(
            new \PHPTest\Test\EmptyTestExceptionTest(),
            new \PHPTest\Test\Assertion\NoAssertionsExceptionTest(),
            new \PHPTest\Test\TestCaseTest(),
            new \PHPTest\Test\ReflectionTest(),
            new \PHPTest\Test\Assertion\ExceptionTest(),
            new \PHPTest\Test\DirectoryTest()
        );

        $output->writeln('Running PHPTest');
        $output->writeln('');

        foreach ($tests as $test) {
            $this->runTestCase($test);
            $this->printTestStats($output, $test);
        }

        $output->writeln('');
        $output->writeln('Finished');
        $output->writeln('');

        $this->printOverallStats($output);
    }

    /**
     * Runs a single TestCase
     *
     * @param PHPTest\TestCase $testCase
     */
    private function runTestCase(TestCase $testCase)
    {
        $testCase->run();
        $stats = $testCase->getStatistics();
        $this->_stats['asserts'] += $stats['asserts'];
        $this->_stats['methods'] += $stats['methods'];
        $this->_stats['passed'] += $stats['passed'];
        $this->_stats['fails'] += $stats['fails'];
    }

    /**
     * Prints the statistics for a TestCase
     */
    private function printTestStats(OutputInterface $output, TestCase $testCase)
    {
        $testStats = $testCase->getStatistics();        
        $info = sprintf(
            '%s - Tests: %d, Assertions: %d, Passed: %d, Failures: %d',
            get_class($testCase),
            $testStats['methods'],
            $testStats['asserts'],
            $testStats['passed'],
            $testStats['fails']
        );

        if ($testStats['fails'] > 0) {
            $output->writeln("<error>{$info}</error>");
        } else {
            $output->writeln("<bg=green>{$info}</bg=green>");
        }

        $output->writeln('');
    }

    /**
     * Prints the overall statistics
     */
    private function printOverallStats(OutputInterface $output)
    {
        $output->writeln('Total:');

        $info = sprintf(
            'Tests: %d, Assertions: %d, Passed: %d, Failures: %d',
            $this->_stats['methods'],
            $this->_stats['asserts'],
            $this->_stats['passed'],
            $this->_stats['fails']
        );

        if ($this->_stats['fails'] > 0) {
            $output->writeln("<error>{$info}</error>");
        } else {
            $output->writeln("<bg=green>{$info}</bg=green>");
        }
    }
}