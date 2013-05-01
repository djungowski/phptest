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
	 * @Test
	 */	
	public function increaseAssertsWithDefaultValue()
	{
		$stats = new Statistics();
		$stats->increaseAsserts();
		$actual = $stats->get();
		$expected = 1;
		$this->assertEquals($expected, $actual['asserts']);
	}

	/**
	 * @Test
	 */	
	public function increaseAssertsWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increaseAsserts(5);
		$actual = $stats->get();
		$expected = 5;
		$this->assertEquals($expected, $actual['asserts']);
	}

	/**
	 * @Test
	 */	
	public function increaseAssertsWithString()
	{
		$stats = new Statistics();
		$stats->increaseAsserts('foob4r');
		$actual = $stats->get();
		$expected = 0;
		$this->assertEquals($expected, $actual['asserts']);
	}
}