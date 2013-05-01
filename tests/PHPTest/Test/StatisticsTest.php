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

	/**
	 * @Test
	 */	
	public function increaseMethodsWithDefaultValue()
	{
		$stats = new Statistics();
		$stats->increaseMethods();
		$actual = $stats->get();
		$expected = 1;
		$this->assertEquals($expected, $actual['methods']);
	}

	/**
	 * @Test
	 */	
	public function increaseMethodsWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increaseMethods(5);
		$actual = $stats->get();
		$expected = 5;
		$this->assertEquals($expected, $actual['methods']);
	}

	/**
	 * @Test
	 */	
	public function increaseMethodsWithString()
	{
		$stats = new Statistics();
		$stats->increaseMethods('foob4r');
		$actual = $stats->get();
		$expected = 0;
		$this->assertEquals($expected, $actual['methods']);
	}

	/**
	 * @Test
	 */	
	public function increasePassedWithDefaultValue()
	{
		$stats = new Statistics();
		$stats->increasePassed();
		$actual = $stats->get();
		$expected = 1;
		$this->assertEquals($expected, $actual['passed']);
	}

	/**
	 * @Test
	 */	
	public function increasePassedWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increasePassed(5);
		$actual = $stats->get();
		$expected = 5;
		$this->assertEquals($expected, $actual['passed']);
	}

	/**
	 * @Test
	 */	
	public function increasePassedWithString()
	{
		$stats = new Statistics();
		$stats->increasePassed('foob4r');
		$actual = $stats->get();
		$expected = 0;
		$this->assertEquals($expected, $actual['passed']);
	}


	/**
	 * @Test
	 */	
	public function increaseFailsWithDefaultValue()
	{
		$stats = new Statistics();
		$stats->increaseFails();
		$actual = $stats->get();
		$expected = 1;
		$this->assertEquals($expected, $actual['fails']);
	}

	/**
	 * @Test
	 */	
	public function increaseFailsWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increaseFails(5);
		$actual = $stats->get();
		$expected = 5;
		$this->assertEquals($expected, $actual['fails']);
	}

	/**
	 * @Test
	 */	
	public function increaseFailsWithString()
	{
		$stats = new Statistics();
		$stats->increaseFails('foob4r');
		$actual = $stats->get();
		$expected = 0;
		$this->assertEquals($expected, $actual['fails']);
	}
}