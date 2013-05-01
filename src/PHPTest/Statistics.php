<?php
namespace PHPTest;

class Statistics
{
	private $_stats = array(
        'asserts'   => 0,
        'methods'   => 0,
        'passed'    => 0,
        'fails'     => 0
    );

	public function get()
	{
		return $this->_stats;
	}

	private function increaseValue($value, $increment)
	{
		$increment = (int)$increment;
		$this->_stats[$value] += $increment;
	}

	public function increaseAsserts($increment = 1)
	{
		$this->increaseValue('asserts', $increment);
	}

	public function increaseMethods($increment = 1)
	{
		$this->increaseValue('methods', $increment);
	}

	public function increasePassed($increment = 1)
	{
		$this->increaseValue('passed', $increment);
	}

	public function increaseFails($increment = 1)
	{
		$this->increaseValue('fails', $increment);
	}

	public function increase(Array $increment)
	{
		foreach ($this->_stats as $key => $value) {
			$this->increaseValue($key, $increment[$key]);
		}
	}
}