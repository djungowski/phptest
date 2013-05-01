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

	public function increaseAsserts($increase = 1)
	{
		$increase = (int)$increase;
		$this->_stats['asserts'] += $increase;
	}

	public function increaseMethods($increase = 1)
	{
		$increase = (int)$increase;
		$this->_stats['methods'] += $increase;
	}

	public function increasePassed($increase = 1)
	{
		$increase = (int)$increase;
		$this->_stats['passed'] += $increase;
	}
}