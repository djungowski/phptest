<?php
namespace PHPTest\Test;

use PHPTest\TestCase;
use PHPTest\Statistics;

class StatisticsTest extends TestCase
{
	/**
	 * @Test
	 */
	public function get()
	{
		$stats = new Statistics();
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 0,
	        'passed'    => 0,
	        'fails'     => 0
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}

	/**
	 * bla
	 */	
	public function defaultIncreaseAsserts()
	{
		$stats = new Statistics();
		$stats->increaseAsserts();
	}
}