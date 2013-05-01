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

	private function increaseValue($value, $increase)
	{
		$increase = (int)$increase;
		$this->_stats[$value] += $increase;
	}

	public function increaseAsserts($increase = 1)
	{
		$this->increaseValue('asserts', $increase);
	}

	public function increaseMethods($increase = 1)
	{
		$this->increaseValue('methods', $increase);
	}

	public function increasePassed($increase = 1)
	{
		$this->increaseValue('passed', $increase);
	}

	public function increaseFails($increase = 1)
	{
		$this->increaseValue('fails', $increase);
	}
}