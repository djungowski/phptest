<?php
namespace PHPTest;

class Statistics
{
	/**
	 * The statistics available for tracking
	 *
	 * @var Array
	 */
	private $_stats = array(
        'asserts'   => 0,
        'methods'   => 0,
        'passed'    => 0,
        'fails'     => 0
    );

	/**
	 * Get all the statistics
	 * Return one specific value if provided
	 *
	 * @param String $value
	 * @return Array
	 */
	public function get($value = null)
	{
		if (!is_null($value)) {
			return $this->_stats[$value];
		}
		return $this->_stats;
	}

	/**
	 * Increase one specific value
	 * 
	 * @param String $value
	 * @param Integer $increment
	 */
	private function increaseValue($value, $increment)
	{
		$increment = (int)$increment;
		$this->_stats[$value] += $increment;
	}

	/**
	 * Increase asserts by a specific value or (default) by 1
	 *
	 * @param Integer $increment
	 */
	public function increaseAsserts($increment = 1)
	{
		$this->increaseValue('asserts', $increment);
	}

	/**
	 * Increase methods by a specific value or (default) by 1
	 *
	 * @param Integer $increment
	 */
	public function increaseMethods($increment = 1)
	{
		$this->increaseValue('methods', $increment);
	}

	/**
	 * Increase passed by a specific value or (default) by 1
	 *
	 * @param Integer $increment
	 */
	public function increasePassed($increment = 1)
	{
		$this->increaseValue('passed', $increment);
	}

	/**
	 * Increase fails by a specific value or (default) by 1
	 *
	 * @param Integer $increment
	 */
	public function increaseFails($increment = 1)
	{
		$this->increaseValue('fails', $increment);
	}

	/**
	 * Increase all values with values from another statistics object
	 *
	 * @param Statistics $increment
	 */
	public function increase(Statistics $increment)
	{
		foreach ($this->_stats as $key => $value) {
			$this->increaseValue($key, $increment->get($key));
		}
	}

	/**
	 * See if the statistics has counted any fails
	 *
	 * @return Boolean
	 */
	public function hasFails()
	{
		return ($this->get('fails') > 0);
	}
}