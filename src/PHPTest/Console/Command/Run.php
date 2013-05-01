<?php

namespace PHPTest\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use PHPTest\TestCase;
use PHPTest\Statistics;

class Run extends Command
{
    protected function configure()
    {
        $this
            ->setName('run')
            ->setDescription('Run tests')
        ;
        $this->setAssertionOptions();
        $this->_stats = new Statistics();
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
            new \PHPTest\Test\TestCaseTest(),
            new \PHPTest\Test\ReflectionTest(),
            new \PHPTest\Test\Assertion\ExceptionTest(),
            new \PHPTest\Test\Assertion\NoAssertionsExceptionTest(),
            new \PHPTest\Test\DirectoryTest(),
            new \PHPTest\Test\StatisticsTest()
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
        $testCase->setStatistics(new Statistics());
        $testCase->run();
        $stats = $testCase->getStatistics();
        $this->_stats->increase($stats);
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
            $testStats->get('methods'),
            $testStats->get('asserts'),
            $testStats->get('passed'),
            $testStats->get('fails')
        );

        if ($testStats->hasFails()) {
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
            $this->_stats->get('methods'),
            $this->_stats->get('asserts'),
            $this->_stats->get('passed'),
            $this->_stats->get('fails')
        );

        if ($this->_stats->hasFails()) {
            $output->writeln("<error>{$info}</error>");
        } else {
            $output->writeln("<bg=green>{$info}</bg=green>");
        }
    }
}