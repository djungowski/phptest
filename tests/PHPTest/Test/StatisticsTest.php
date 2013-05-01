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
		$expected = array(
	        'asserts'   => 1,
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
	public function increaseAssertsWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increaseAsserts(5);
		$expected = array(
	        'asserts'   => 5,
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
	public function increaseAssertsWithString()
	{
		$stats = new Statistics();
		$stats->increaseAsserts('foob4r');
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
	public function increaseMethodsWithDefaultValue()
	{
		$stats = new Statistics();
		$stats->increaseMethods();
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 1,
	        'passed'    => 0,
	        'fails'     => 0
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}

	/**
	 * @Test
	 */	
	public function increaseMethodsWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increaseMethods(5);
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 5,
	        'passed'    => 0,
	        'fails'     => 0
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}

	/**
	 * @Test
	 */	
	public function increaseMethodsWithString()
	{
		$stats = new Statistics();
		$stats->increaseMethods('foob4r');
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
	public function increasePassedWithDefaultValue()
	{
		$stats = new Statistics();
		$stats->increasePassed();
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 0,
	        'passed'    => 1,
	        'fails'     => 0
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}

	/**
	 * @Test
	 */	
	public function increasePassedWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increasePassed(5);
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 0,
	        'passed'    => 5,
	        'fails'     => 0
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}

	/**
	 * @Test
	 */	
	public function increasePassedWithString()
	{
		$stats = new Statistics();
		$stats->increasePassed('foob4r');
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
	public function increaseFailsWithDefaultValue()
	{
		$stats = new Statistics();
		$stats->increaseFails();
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 0,
	        'passed'    => 0,
	        'fails'     => 1
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}

	/**
	 * @Test
	 */	
	public function increaseFailsWithCustomValue()
	{
		$stats = new Statistics();
		$stats->increaseFails(5);
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 0,
	        'passed'    => 0,
	        'fails'     => 5
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}

	/**
	 * @Test
	 */	
	public function increaseFailsWithString()
	{
		$stats = new Statistics();
		$stats->increaseFails('foob4r');
		$expected = array(
	        'asserts'   => 0,
	        'methods'   => 0,
	        'passed'    => 0,
	        'fails'     => 0
	    );
	    $actual = $stats->get();
	    $this->assertEquals($expected, $actual);
	}
}